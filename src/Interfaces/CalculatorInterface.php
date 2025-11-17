<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Intervention\Zodiac\Astrology;
use Stringable;

interface CalculatorInterface
{
    /**
     * Factory method to create calculator with calender to calculate with
     */
    public static function withAstrology(Astrology $astrology): self;

    /**
     * Calculate zodiac from given date of type string
     */
    public static function fromString(string|Stringable $date, ?Astrology $astrology = null): SignInterface;

    /**
     * Calculate zodiac from given date object which implements DateTimeInterface
     */
    public static function fromDate(DateTimeInterface $date, ?Astrology $astrology = null): SignInterface;

    /**
     * Calculate zodiac from given unix timestamp date
     */
    public static function fromUnix(string|int|float $date, ?Astrology $astrology = null): SignInterface;

    /**
     * Calculate zodiac from given Carbon date
     */
    public static function fromCarbon(CarbonInterface $date, ?Astrology $astrology = null): SignInterface;

    /**
     * Calculate zodiac sign compatibility between given objects
     */
    public static function compare(SignInterface $sign, SignInterface $with): float;
}
