<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel\Facades;

use DateTimeInterface;
use Illuminate\Support\Facades\Facade;
use Intervention\Zodiac\Interfaces\SignInterface;
use Stringable;

/**
 * @method SignInterface calculate(string|Stringable|int|float|DateTimeInterface $date)
 */
class Zodiac extends Facade
{
    /**
     * @return string
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint
    protected static function getFacadeAccessor()
    {
        return 'zodiac';
    }
}
