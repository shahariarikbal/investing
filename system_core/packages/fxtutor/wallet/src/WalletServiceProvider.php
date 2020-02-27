<?php

namespace Fxtutor\Wallet;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

Class WalletServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->registerRoutes();
        $this->registerViews();
        $this->registerTranlations();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
    }

    /**
     * Setup the configuration for Cashier.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/wallet.php',
            'wallet'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/invoice.php',
            'invoice'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/member.php',
            'member'
        );
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'dashboard/wallet',
            'namespace' => 'Fxtutor\Wallet\Http\Controllers',
            'middleware' => ['web', 'auth'],
            'as' => 'wallet.',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }


    /**
     * Register the package migrations.
     *
     * @return void
     */
    protected function registerMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }
    }

    /**
     * Register the translation files
     * 
     * @return void
     */
    protected function registerTranlations ()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'wallet');
    }

    /**
     * Register the package Views files
     * 
     * @return void
     */
    protected function registerViews () {
        $this->loadViewsFrom( __DIR__.'/../resources/views', 'wallet');
    }

        /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/wallet.php' => $this->app->configPath('wallet.php'),
            ], 'wallet');

            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], 'wallet-migrations');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/wallet'),
            ], 'wallet-views');
        }
    }
}
