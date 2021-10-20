<?php

namespace Bagisto\StockNotify\Providers;

use Bagisto\StockNotify\Console\Commands\SendOutOfStockNotifcation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Event;

class StockNotifyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'stocknotify');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'stocknotify');

        $this->publishes([
            __DIR__.'/../Resources/views/email' => resource_path('views/stocknotify'),
        ]);

        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);

            if (core()->getConfigData('catalog.inventory.notifications.status')) {
                if (core()->getConfigData('catalog.inventory.notifications.schedule') == "hourly") {
                    $schedule->command(SendOutOfStockNotifcation::class)->hourly()->runInBackground();
                }

                if (core()->getConfigData('catalog.inventory.notifications.schedule') == "daily") {
                    $schedule->command(SendOutOfStockNotifcation::class)->daily()->runInBackground();
                }

                if (core()->getConfigData('catalog.inventory.notifications.schedule') == "weekly") {
                    $schedule->command(SendOutOfStockNotifcation::class)->weekly()->runInBackground();
                }

                if ($this->app->runningInConsole()) {
                    $this->commands([
                        SendOutOfStockNotifcation::class
                    ]);
                }
            }

        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/system.php', 'core'
        );
    }
}