<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
                info("Xoss Games Test Schedule Run");
            });
            
        $schedule->command('subscription:renew')->timezone('Asia/Dhaka')->dailyAt('8:00')->runInBackground();
        $schedule->command('subscription:renew')->timezone('Asia/Dhaka')->dailyAt('12:00')->runInBackground();
        $schedule->command('subscription:renew')->timezone('Asia/Dhaka')->dailyAt('16:00')->runInBackground();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
