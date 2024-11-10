<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Exceptions\NotReadableException;
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
     * @param mixed $date
     * @throws NotReadableException
     * @throws InvalidArgumentException
     * @throws ReflectionException
     * @return ZodiacInterface
     */
    public function make(mixed $date): ZodiacInterface
    {
        return (new Calculator())
            ->setTranslator($this->app['translator'])
            ->zodiac($date);
    }
}
