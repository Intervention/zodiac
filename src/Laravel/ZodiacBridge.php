<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use DateTimeInterface;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Translation\Translator;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use InvalidArgumentException;
use ReflectionException;

class ZodiacBridge
{
    public function __construct(protected Application $app)
    {
        //
    }

    /**
     * Create zodiac from input date
     *
     * @param int|string|DateTimeInterface $date
     * @throws NotReadableException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @throws RuntimeException
     * @throws BindingResolutionException
     * @return ZodiacInterface
     */
    public function make(int|string|DateTimeInterface $date): ZodiacInterface
    {
        $calculator = new Calculator();
        $calculator->setTranslator($this->translator());

        return $calculator->zodiac($date);
    }

    /**
     * @return Translator
     * @throws BindingResolutionException
     * @throws RuntimeException
     */
    private function translator(): Translator
    {
        $translator = $this->app->make(Translator::class);

        if (!($translator instanceof Translator)) {
            throw new RuntimeException('Unable to resolve translator from Laravel application.');
        }

        return $translator;
    }
}
