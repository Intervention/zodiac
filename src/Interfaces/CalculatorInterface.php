<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use DateTimeInterface;
use Stringable;

interface CalculatorInterface
{
    /**
     * Calculate zodiac from given date of type string
     */
    public static function fromString(string|Stringable $date): ZodiacInterface;

    /**
     * Calculate zodiac from given date object which implements DateTimeInterface
     */
    public static function fromDate(DateTimeInterface $date): ZodiacInterface;

    /**
     * Calculate zodiac from given unix timestamp date
     */
    public static function fromUnix(string|int $date): ZodiacInterface;

    /**
     * Calculate zodiac sign compatibility between given objects
     */
    public static function compare(ZodiacInterface $zodiac, ZodiacInterface $with): float;
}
