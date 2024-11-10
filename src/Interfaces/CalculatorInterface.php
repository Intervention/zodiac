<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use DateTimeInterface;

interface CalculatorInterface
{
    /**
     * Get zodiac for given date
     *
     * @param int|string|DateTimeInterface $date
     * @return ZodiacInterface
     */
    public static function zodiac(int|string|DateTimeInterface $date): ZodiacInterface;
}
