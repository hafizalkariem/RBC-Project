<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class WebhookController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function handle(Request $request)
    {
        // Force log webhook calls
        file_put_contents(storage_path('logs/webhook.log'), 
            "[" . date('Y-m-d H:i:s') . "] Webhook received: " . json_encode($request->all()) . "\n", 
            FILE_APPEND
        );
        
        \Log::info('Webhook received', $request->all());
        
        try {
            $notification = new Notification();
            
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status;
            $orderId = $notification->order_id;
            
            \Log::info('Processing webhook', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'payment_type' => $notification->payment_type ?? 'unknown'
            ]);
            
            // Find order
            $order = Order::where('payment_id', $orderId)->first();
            
            if (!$order) {
                \Log::error('Order not found', ['order_id' => $orderId]);
                return response()->json(['message' => 'Order not found'], 404);
            }
            
            // Skip if order is already completed to prevent overwriting
            if ($order->status === 'completed' && $transactionStatus !== 'settlement') {
                \Log::info('Order already completed, skipping update', ['order_id' => $orderId]);
                return response()->json(['message' => 'Order already completed']);
            }

            // Handle different payment status
            if ($transactionStatus == 'settlement') {
                if ($fraudStatus == 'challenge') {
                    $order->update([
                        'payment_status' => 'challenge',
                        'payment_details' => $notification->getResponse()
                    ]);
                } else {
                    // Update order status to completed
                    $order->update([
                        'status' => 'completed',
                        'payment_status' => 'settlement',
                        'payment_method' => $this->mapPaymentMethod($notification->payment_type),
                        'paid_at' => now(),
                        'payment_details' => $notification->getResponse()
                    ]);
                    \Log::info('Order completed', ['order_id' => $orderId]);
                }
            } else if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $order->update([
                        'payment_status' => 'challenge',
                        'payment_details' => $notification->getResponse()
                    ]);
                } else if ($fraudStatus == 'accept') {
                    $order->update([
                        'status' => 'completed',
                        'payment_status' => 'settlement',
                        'payment_method' => $this->mapPaymentMethod($notification->payment_type),
                        'paid_at' => now(),
                        'payment_details' => $notification->getResponse()
                    ]);
                    \Log::info('Order completed via capture', ['order_id' => $orderId]);
                }
            } else if ($transactionStatus == 'pending') {
                // Update payment method even for pending status
                $order->update([
                    'payment_status' => 'pending',
                    'payment_method' => $this->mapPaymentMethod($notification->payment_type),
                    'payment_details' => $notification->getResponse()
                ]);
                \Log::info('Order pending with payment method', ['order_id' => $orderId, 'payment_method' => $this->mapPaymentMethod($notification->payment_type)]);
            } else if ($transactionStatus == 'deny') {
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'deny',
                    'payment_details' => $notification->getResponse()
                ]);
            } else if ($transactionStatus == 'expire') {
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'expire',
                    'payment_details' => $notification->getResponse()
                ]);
                \Log::info('Order expired', ['order_id' => $orderId]);
            } else if ($transactionStatus == 'cancel') {
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'cancel',
                    'payment_details' => $notification->getResponse()
                ]);
                \Log::info('Order cancelled', ['order_id' => $orderId]);
            }

            return response()->json(['message' => 'OK']);
            
        } catch (\Exception $e) {
            \Log::error('Webhook error: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    
    // Test webhook endpoint
    public function test(Request $request)
    {
        file_put_contents(storage_path('logs/webhook.log'), 
            "[" . date('Y-m-d H:i:s') . "] Test webhook called\n", 
            FILE_APPEND
        );
        
        return response()->json([
            'status' => 'success',
            'message' => 'Webhook test successful',
            'timestamp' => now(),
            'request_data' => $request->all()
        ]);
    }
    
    private function mapPaymentMethod($midtransPaymentType)
    {
        $paymentMap = [
            // Bank Transfer
            'bank_transfer' => 'bank_transfer',
            'permata' => 'bank_transfer',
            'bca' => 'bank_transfer',
            'bni' => 'bank_transfer',
            'bri' => 'bank_transfer',
            'mandiri' => 'bank_transfer',
            'other_va' => 'bank_transfer',
            
            // Credit Card
            'credit_card' => 'credit_card',
            
            // E-Wallet
            'gopay' => 'e_wallet',
            'shopeepay' => 'e_wallet',
            'dana' => 'e_wallet',
            'linkaja' => 'e_wallet',
            'ovo' => 'e_wallet',
            
            // QRIS
            'qris' => 'qris',
            
            // Others
            'cstore' => 'other',
            'cardless_credit' => 'other',
            'bca_klikpay' => 'other',
            'bca_klikbca' => 'other',
            'cimb_clicks' => 'other',
            'danamon_online' => 'other',
            'indomaret' => 'other',
            'alfamart' => 'other'
        ];
        
        return $paymentMap[$midtransPaymentType] ?? 'other';
    }
}