<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;
use Midtrans\Config;
use Midtrans\Transaction;

class SyncExpiredPayments extends Command
{
    protected $signature = 'payments:sync-expired';
    protected $description = 'Sync expired payments from Midtrans';

    public function handle()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        $pendingOrders = Order::where('payment_status', 'pending')
            ->whereNotNull('payment_id')
            ->whereNotNull('payment_details')
            ->get();

        $synced = 0;
        $expired = 0;

        foreach ($pendingOrders as $order) {
            // First check if payment is expired based on expiry_time in payment_details
            $paymentDetails = $order->payment_details;
            $isLocallyExpired = false;
            
            if (isset($paymentDetails['expiry_time'])) {
                $expiryTime = \Carbon\Carbon::parse($paymentDetails['expiry_time']);
                if ($expiryTime->isPast()) {
                    $isLocallyExpired = true;
                }
            }
            
            if ($isLocallyExpired) {
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'expire'
                ]);
                $expired++;
                $synced++;
                continue;
            }
            
            // If not locally expired, check with Midtrans API
            try {
                $status = Transaction::status($order->payment_id);
                $transactionStatus = strtolower($status->transaction_status);

                if ($transactionStatus !== 'pending') {
                    $updateData = [
                        'payment_status' => $transactionStatus,
                        'payment_details' => json_decode(json_encode($status), true)
                    ];

                    if ($transactionStatus === 'settlement') {
                        $updateData['status'] = 'completed';
                        $updateData['paid_at'] = now();
                    } elseif (in_array($transactionStatus, ['expire', 'cancel', 'deny'])) {
                        $updateData['status'] = 'failed';
                        if ($transactionStatus === 'expire') {
                            $expired++;
                        }
                    }

                    $order->update($updateData);
                    $synced++;
                }
            } catch (\Exception $e) {
                if (strpos($e->getMessage(), '404') !== false) {
                    $order->update([
                        'status' => 'cancelled',
                        'payment_status' => 'expire'
                    ]);
                    $expired++;
                    $synced++;
                }
            }
        }

        $this->info("Synced {$synced} orders, {$expired} expired");
        return 0;
    }
}