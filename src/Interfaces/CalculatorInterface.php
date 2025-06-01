<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use DateTimeInterface;

interface CalculatorInterface
{
    /**
     * Get zodiac for given date
     */
    public static function zodiac(int|string|DateTimeInterface $date): ZodiacInterface;

    /**
     * Calculate zodiac sign compatibility between given objects
     */
    public static function compare(ZodiacInterface $zodiac1, ZodiacInterface $zodiac2): float;
}
