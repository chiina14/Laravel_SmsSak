<?php

namespace Hamada\Laravel_SmsSak;

use Illuminate\Support\ServiceProvider;

class SmsSakServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/smssak.php', 'smssak');

        $this->app->singleton('smssak', function ($app) {
            return new SmsSak();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/smssak.php' => config_path('smssak.php'),
        ], 'config');
    }
}
