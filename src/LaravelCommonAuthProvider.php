<?php
namespace Junichimura\LaravelCommonAuth;

use Illuminate\Support\ServiceProvider;

class LaravelCommonAuthProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel_common_auth.php', 'laravel_common_auth');
    }

    public function boot()
    {
        /**
         * publish
         */
        $this->publishes([
            __DIR__.'/../config/laravel_common_auth.php' => config_path('laravel_common_auth.php'),
            __DIR__.'/../resources/' => resource_path('views/vendor/laravel_common_auth'),
        ]);

        /**
         * routes
         */
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        /**
         * views
         */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel_common_auth');

        /**
         * i18n
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel_common_auth');
    }
}