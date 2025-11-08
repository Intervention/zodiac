<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\Translator;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\CalculatorInterface;

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
        $this->app->singleton('zodiac', function (Application $app): CalculatorInterface {
            $translator = $app->make(Translator::class);

            if (!($translator instanceof Translator)) {
                throw new RuntimeException('Unable to resolve translator from Laravel application.');
            }

            $calculator = new Calculator();
            $calculator->setTranslator($translator);

            return $calculator;
        });
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
