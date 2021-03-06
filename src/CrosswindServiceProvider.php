<?php

namespace JeroenG\Crosswind;

use Illuminate\Support\ServiceProvider;

class CrosswindServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crosswind');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/crosswind'),
            ], 'crosswind.views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/../resources/public' => public_path('vendor/crosswind'),
            ], 'crosswind.assets');

            $this->publishes([
                __DIR__.'/../resources/assets' => base_path('resources/assets/vendor/crosswind'),
            ], 'crosswind.assets');

            // Publishing the translation files.
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/jeroeng'),
            ], 'crosswind.views');

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }
}
