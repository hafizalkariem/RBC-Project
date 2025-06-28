<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use App\Models\Order;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get user statistics
        $stats = $this->getUserStats($user->id);
        
        // Get recent transactions
        $recentTransactions = $this->getRecentTransactions($user->id);
        
        // Get pending payment (if any)
        $pendingPayment = $this->getPendingPayment($user->id);
        
        return view('profile.index', compact('user', 'stats', 'recentTransactions', 'pendingPayment'));
    }
    
    public function transactions()
    {
        $user = Auth::user();
        
        $transactions = Order::with(['orderItems.product'])
            ->where('user_id', $user->id)
            ->whereNotNull('payment_id')
            ->latest()
            ->paginate(10);
            
        return view('profile.transactions', compact('transactions'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'current_password' => 'nullable|required_with:password',
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->image && Storage::exists('public/' . $user->image)) {
                Storage::delete('public/' . $user->image);
            }
            
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
            $user->image = $photoPath;
        }
        
        // Update basic info
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->address = $request->location;
        
        // Update password if provided
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    
    private function getUserStats($userId)
    {
        $totalOrders = Order::where('user_id', $userId)->whereNotNull('payment_id')->count();
        $completedOrders = Order::where('user_id', $userId)->where('status', 'completed')->count();
        $pendingOrders = Order::where('user_id', $userId)->where('status', 'pending')->whereNotNull('payment_id')->count();
        $totalSpent = Order::where('user_id', $userId)->where('status', 'completed')->sum('total_amount');
        
        $failedOrders = Order::where('user_id', $userId)->where('status', 'failed')->count();
        
        return [
            'total_orders' => $totalOrders,
            'completed_orders' => $completedOrders,
            'pending_orders' => $pendingOrders,
            'failed_orders' => $failedOrders,
            'total_spent' => $totalSpent
        ];
    }
    
    private function getRecentTransactions($userId, $limit = 5)
    {
        return Order::with(['orderItems.product'])
            ->where('user_id', $userId)
            ->whereNotNull('payment_id')
            ->latest()
            ->limit($limit)
            ->get();
    }
    
    private function getPendingPayment($userId)
    {
        $pendingOrder = Order::with(['orderItems.product'])
            ->where('user_id', $userId)
            ->where('payment_status', 'pending')
            ->whereNotNull('payment_id')
            ->whereNotNull('snap_token')
            ->first();
            
        if ($pendingOrder) {
            // Auto-sync with Midtrans before checking
            $this->syncOrderWithMidtrans($pendingOrder);
            
            // Refresh order data after sync
            $pendingOrder = $pendingOrder->fresh();
            
            // Skip if no longer pending after sync
            if ($pendingOrder->payment_status !== 'pending') {
                return null;
            }
            
            // Add expiry information if available
            if ($pendingOrder->payment_details && isset($pendingOrder->payment_details['expiry_time'])) {
                $expiryTime = Carbon::parse($pendingOrder->payment_details['expiry_time'], 'Asia/Jakarta');
                
                if ($expiryTime->isPast()) {
                    // Auto-expire the payment
                    $pendingOrder->update([
                        'status' => 'cancelled',
                        'payment_status' => 'expire'
                    ]);
                    return null;
                }
                
                // Add expiry timestamp for JavaScript countdown (convert to Jakarta timezone)
                $pendingOrder->expiry_timestamp = $expiryTime->setTimezone('Asia/Jakarta')->timestamp;
                $pendingOrder->expiry_time_formatted = $expiryTime->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
            }
        }
        
        return $pendingOrder;
    }
    
    private function syncOrderWithMidtrans($order)
    {
        try {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            
            $status = \Midtrans\Transaction::status($order->payment_id);
            
            $paymentStatus = strtolower($status->transaction_status);
            $paymentMethod = isset($status->payment_type) ? $status->payment_type : null;
            
            $updateData = [
                'payment_status' => $paymentStatus,
                'payment_details' => json_decode(json_encode($status), true)
            ];
            
            if ($paymentMethod) {
                $paymentMap = [
                    'qris' => 'qris',
                    'gopay' => 'e_wallet',
                    'shopeepay' => 'e_wallet',
                    'dana' => 'e_wallet',
                    'bca' => 'bank_transfer',
                    'bni' => 'bank_transfer',
                    'bri' => 'bank_transfer',
                    'mandiri' => 'bank_transfer',
                    'credit_card' => 'credit_card'
                ];
                $updateData['payment_method'] = $paymentMap[$paymentMethod] ?? 'other';
            }
            
            // Update order status based on payment status
            if ($paymentStatus === 'settlement') {
                $updateData['status'] = 'completed';
                $updateData['paid_at'] = now();
            } elseif (in_array($paymentStatus, ['expire', 'cancel', 'deny'])) {
                $updateData['status'] = 'cancelled';
            }
            
            $order->update($updateData);
            
        } catch (\Exception $e) {
            // Handle 404 - transaction doesn't exist in Midtrans
            if (strpos($e->getMessage(), '404') !== false || strpos($e->getMessage(), "doesn't exist") !== false) {
                // Mark as failed if transaction not found in Midtrans
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'expire'
                ]);
            } else {
                // Log other errors but don't break the flow
                \Log::error('Auto-sync failed for order ' . $order->id . ': ' . $e->getMessage());
            }
        }
    }
}