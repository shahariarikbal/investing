<?php

namespace App\Console;

use App\Console\Commands\SubscriptionChargeDueInvoice;
use App\Console\Commands\SubscriptionExpirationReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SubscriptionExpirationReminder::class,
        SubscriptionChargeDueInvoice::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('subscription:expiration-reminder 1')->dailyAt('00:00');
        $schedule->command('subscription:expiration-reminder 7')->dailyAt('00:10');
        $schedule->command('subscription:expiration-reminder 15')->dailyAt('00:20');
        $schedule->command('subscription:charge-due-invoice')->dailyAt('01:00');
        $schedule->command('monthly-trade-statement:charge-due-invoice')->dailyAt('00:30');
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
