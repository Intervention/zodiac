<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ZodiacServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     */
    protected bool $defer = true;

    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        // load translation files
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'zodiacs');
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->singleton('zodiac', fn(Application $app): ZodiacBridge => new ZodiacBridge($app));
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint
    public function provides()
    {
        return ['zodiac'];
    }
}
