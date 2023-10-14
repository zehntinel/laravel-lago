<?php

namespace Zehntinel\LaravelLago;

use Carbon\Laravel\ServiceProvider;
use Zehntinel\LaravelLago\Contracts\LagoServiceContract;

class LaravelLagoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Setup config publishing
        $this->publishes([
            __DIR__.'/../config/lago.php' => config_path('lago.php'),
        ]);
    }

    public function register(): void
    {
        // Register config.
        $this->mergeConfigFrom(
            __DIR__.'/../config/lago.php',
            'lago'
        );

        $this->app->singleton(LagoServiceContract::class, function ($app) {
            return new LagoService($app->make('config')['lago']);
        });
    }
}
