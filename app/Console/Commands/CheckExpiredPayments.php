<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class CheckExpiredPayments extends Command
{
    protected $signature = 'payments:check-expired';
    protected $description = 'Check and update expired payments';

    public function handle()
    {
        $expiredCount = 0;
        
        // Get pending orders with payment details
        $pendingOrders = Order::where('payment_status', 'pending')
            ->whereNotNull('payment_details')
            ->get();
            
        foreach ($pendingOrders as $order) {
            $paymentDetails = $order->payment_details;
            
            if (isset($paymentDetails['expiry_time'])) {
                $expiryTime = Carbon::parse($paymentDetails['expiry_time']);
                
                if ($expiryTime->isPast()) {
                    $order->update([
                        'payment_status' => 'expire'
                    ]);
                    $expiredCount++;
                    $this->info("Order #{$order->id} marked as expired");
                }
            }
        }
        
        $this->info("Checked expired payments. {$expiredCount} orders expired.");
        return 0;
    }
}