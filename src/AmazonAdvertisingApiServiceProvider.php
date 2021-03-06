<?php

namespace Jagalan\AmazonAdvertisingApi;

use Illuminate\Support\ServiceProvider;
use Jagalan\AmazonAdvertisingApi\Command\AmazonAdvertisingApiTokenCommand;

class AmazonAdvertisingApiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        /*$source = dirname(__DIR__).'/config/amazon-advertising-api.php';

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('amazon-advertising-api.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('amazon-advertising-api');
        }

        $this->mergeConfigFrom($source, 'amazon-advertising-api');*/

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/amazon-advertising-api.php', 'amazon-advertising-api');
        // Console commands
        $this->commands([
            AmazonAdvertisingApiTokenCommand::class,
        ]);

        // Register the service the package provides.
        $this->app->singleton('amazonadvertisingapi', function ($app) {
            return new AmazonAdvertisingApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['amazonadvertisingapi'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/amazon-advertising-api.php' => config_path('amazon-advertising-api.php'),
        ], 'config');
    }
}
