<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

interface CalculatorInterface
{
    /**
     * Get zodiac for given date
     *
     * @param mixed $date
     * @return ZodiacInterface
     */
    public static function make(mixed $date): ZodiacInterface;

    /**
     * Get zodiac for given date
     *
     * @param mixed $date
     * @return ZodiacInterface
     */
    public function zodiac(mixed $date): ZodiacInterface;
}
