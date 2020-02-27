<?php

namespace App\Providers;

use App\Notifiers\SignalNotifier;
use Illuminate\Support\ServiceProvider;
use App\Notifiers\PerformanceGraphNotifier;
use App\Notifiers\MonthlyTradeStatementNotifier;

class NotifierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SignalNotifier', function() {
            return new SignalNotifier();
        });
        
        $this->app->bind('PerformanceGraphNotifier', function() {
            return new PerformanceGraphNotifier();
        });
        
        $this->app->bind('MonthlyTradeStatementNotifier', function() {
            return new MonthlyTradeStatementNotifier();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dd('i\'m booted');
    }
}
