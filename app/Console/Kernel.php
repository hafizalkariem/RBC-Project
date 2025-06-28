<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SyncExpiredPayments::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Sync expired payments every 30 minutes
        $schedule->command('payments:sync-expired')
                 ->everyThirtyMinutes()
                 ->withoutOverlapping();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}