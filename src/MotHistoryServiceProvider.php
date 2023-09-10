<?php

namespace ImaginativeImpact\LaravelMotHistory;

use Illuminate\Support\ServiceProvider;

class MotHistoryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/mot-history.php' => config_path('mot-history.php'),
            ], 'config');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mot-history.php', 'mot-history');

        // Register the service the package provides.
        $this->app->singleton('mot-history', function ($app) {
            return new MotHistory;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() : array
    {
        return ['mot-history'];
    }
}