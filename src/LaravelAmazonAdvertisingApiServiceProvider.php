<?php

namespace Jagalan\LaravelAmazonAdvertisingApi;

use Illuminate\Support\ServiceProvider;

class LaravelAmazonAdvertisingApiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'jagalan');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'jagalan');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

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
        $this->mergeConfigFrom(__DIR__.'/../config/laravelamazonadvertisingapi.php', 'laravelamazonadvertisingapi');

        // Register the service the package provides.
        $this->app->singleton('laravelamazonadvertisingapi', function ($app) {
            return new LaravelAmazonAdvertisingApi;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelamazonadvertisingapi'];
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
            __DIR__.'/../config/laravelamazonadvertisingapi.php' => config_path('laravelamazonadvertisingapi.php'),
        ], 'laravelamazonadvertisingapi.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/jagalan'),
        ], 'laravelamazonadvertisingapi.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/jagalan'),
        ], 'laravelamazonadvertisingapi.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/jagalan'),
        ], 'laravelamazonadvertisingapi.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
