<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Get pending order without payment_id (active cart)
        $order = Order::with(['orderItems.product', 'user'])
                     ->where('user_id', Auth::id())
                     ->where('status', 'pending')
                     ->whereNull('payment_id')
                     ->first();

        if (!$order || $order->orderItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }

        // Prepare transaction details
        $transactionDetails = [
            'order_id' => 'ORDER-' . $order->id . '-' . time(),
            'gross_amount' => $order->total_amount,
        ];

        // Prepare item details
        $itemDetails = [];
        foreach ($order->orderItems as $item) {
            $itemDetails[] = [
                'id' => $item->product->id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'name' => $item->product->name,
            ];
        }

        // Prepare customer details
        $customerDetails = [
            'first_name' => $order->user->name,
            'email' => $order->user->email,
        ];

        // Prepare transaction data
        $transactionData = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];

        try {
            // Get Snap token
            $snapToken = Snap::getSnapToken($transactionData);
            
            // Update order with payment info
            $order->update([
                'payment_id' => $transactionDetails['order_id'],
                'snap_token' => $snapToken,
                'payment_status' => 'pending',
                'payment_method' => null // Reset payment method, will be set by webhook
            ]);

            return view('checkout.payment', compact('order', 'snapToken'));
            
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        $orderId = $request->get('order_id');
        $order = Order::where('payment_id', $orderId)->first();

        if ($order) {
            // Don't update payment_method here, let webhook handle it
            if ($order->status !== 'completed') {
                $order->update([
                    'status' => 'completed',
                    'payment_status' => 'settlement',
                    'paid_at' => now()
                ]);
            }
            
            return view('checkout.success', compact('order'));
        }

        return redirect()->route('toko')->with('error', 'Order tidak ditemukan');
    }

    public function pending(Request $request)
    {
        $orderId = $request->get('order_id');
        $order = Order::where('payment_id', $orderId)->first();

        if ($order) {
            return view('checkout.pending', compact('order'));
        }

        return redirect()->route('toko')->with('error', 'Order tidak ditemukan');
    }

    public function error(Request $request)
    {
        $orderId = $request->get('order_id');
        $order = Order::where('payment_id', $orderId)->first();

        if ($order) {
            return view('checkout.error', compact('order'));
        }

        return redirect()->route('toko')->with('error', 'Order tidak ditemukan');
    }
}