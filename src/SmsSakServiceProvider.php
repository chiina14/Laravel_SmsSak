<?php

namespace Hamada\Laravel_SmsSak;

use Illuminate\Support\ServiceProvider;

class SmsSakServiceProvider extends ServiceProvider
{
    public function register()
    {
        // دمج الإعدادات من ملف smssak.php
        $this->mergeConfigFrom(__DIR__ . '/../config/smssak.php', 'smssak');

        // تسجيل الـ singleton
        $this->app->singleton(SmsSak::class, function () {
            return new SmsSak();
        });
    }

    public function boot()
    {
        // نشر الإعدادات
        $this->publishes([
            __DIR__ . '/../config/smssak.php' => config_path('smssak.php'),
        ], 'config');
    }
}
