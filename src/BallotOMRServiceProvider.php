<?php

namespace LBHurtado\BallotOMR;

use Illuminate\Support\ServiceProvider;

class BallotOMRServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('ballot-omr.php'),
            ], 'ballot-omr_config');

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'ballot-omr');

        // Register the main class to use with the facade
        $this->app->singleton('ballot-omr', function ($app) {
            return new BallotOMRManager($app);
        });

        $this->app->singleton(BallotOMRManager::class, function ($app) {
            return $app->make('ballot-omr');
        });
    }
}
