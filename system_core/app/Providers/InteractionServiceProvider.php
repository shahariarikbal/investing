<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interaction\Interaction;

class InteractionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Interaction', function () {
            return new Interaction();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
