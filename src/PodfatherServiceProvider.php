<?php

namespace Podfather;

use Illuminate\Support\ServiceProvider;

class PodfatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/podfather.php', 'podfather');

        $this->app->singleton(PodfatherClient::class, function ($app) {
            return new PodfatherClient(
                config('podfather.base_url'),
                config('podfather.api_key')
            );
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/podfather.php' => config_path('podfather.php'),
            ], 'config');
        }
    }
}