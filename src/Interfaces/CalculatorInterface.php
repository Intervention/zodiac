<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use DateTimeInterface;
use Intervention\Zodiac\Astrology;
use Stringable;

interface CalculatorInterface
{
    /**
     * Static factory method to create calculator.
     */
    public static function create(Astrology $astrology): self;

    /**
     * Calculate zodiac sign from different sources based on current or given astrology.
     */
    public function calculate(
        string|Stringable|int|float|DateTimeInterface $date,
        ?Astrology $astrology = null,
    ): SignInterface;
}
