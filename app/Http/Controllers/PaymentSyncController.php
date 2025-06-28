<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Transaction;

class PaymentSyncController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
    }

    public function checkStatus($orderId)
    {
        $order = Order::where('payment_id', $orderId)->first();
        
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Auto-sync with Midtrans if still pending
        if (in_array($order->payment_status, ['pending', 'expire'])) {
            try {
                $status = Transaction::status($orderId);
                $paymentStatus = strtolower($status->transaction_status);
                
                if ($paymentStatus !== $order->payment_status) {
                    $updateData = [
                        'payment_status' => $paymentStatus,
                        'payment_details' => json_decode(json_encode($status), true)
                    ];
                    
                    if ($paymentStatus === 'settlement') {
                        $updateData['status'] = 'completed';
                        $updateData['paid_at'] = now();
                        $updateData['payment_method'] = $this->mapPaymentMethod($status->payment_type ?? 'unknown');
                    } elseif (in_array($paymentStatus, ['expire', 'cancel', 'deny'])) {
                        $updateData['status'] = 'cancelled';
                    }
                    
                    $order->update($updateData);
                    $order = $order->fresh();
                }
            } catch (\Exception $e) {
                if (strpos($e->getMessage(), '404') !== false) {
                    $order->update([
                        'status' => 'failed',
                        'payment_status' => 'expire'
                    ]);
                    $order = $order->fresh();
                }
            }
        }
        
        return response()->json([
            'status' => $order->status,
            'payment_status' => $order->payment_status,
            'payment_method' => $order->payment_method
        ]);
    }

    private function mapPaymentMethod($midtransPaymentType)
    {
        $paymentMap = [
            'bank_transfer' => 'bank_transfer',
            'permata' => 'bank_transfer',
            'bca' => 'bank_transfer',
            'bni' => 'bank_transfer',
            'bri' => 'bank_transfer',
            'mandiri' => 'bank_transfer',
            'other_va' => 'bank_transfer',
            'credit_card' => 'credit_card',
            'gopay' => 'e_wallet',
            'shopeepay' => 'e_wallet',
            'dana' => 'e_wallet',
            'linkaja' => 'e_wallet',
            'ovo' => 'e_wallet',
            'qris' => 'qris',
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