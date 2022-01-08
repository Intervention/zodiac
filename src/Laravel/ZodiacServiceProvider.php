<?php

namespace Intervention\Zodiac\Laravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Intervention\Zodiac\Calculator;

class ZodiacServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // load translation files
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'zodiacs');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('zodiac', function ($app) {
            return (new Calculator())->setTranslator($app['translator']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['zodiac'];
    }
}
