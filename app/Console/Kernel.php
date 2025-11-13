<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Update exchange rates daily at 2 AM
        $schedule->command('exchange-rates:fetch')
                 ->dailyAt('02:00')
                 ->withoutOverlapping()
                 ->onFailure(function () {
                     // Log the failure or send notification
                     \Log::error('Failed to update exchange rates');
                 })
                 ->onSuccess(function () {
                     \Log::info('Exchange rates updated successfully via scheduler');
                 });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}