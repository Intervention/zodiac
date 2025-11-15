<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Intervention\Zodiac\Calendar;
use Stringable;

interface CalculatorInterface
{
    /**
     * Calculate zodiac from given date of type string
     */
    public static function fromString(string|Stringable $date, Calendar $calendar = Calendar::WESTERN): SignInterface;

    /**
     * Calculate zodiac from given date object which implements DateTimeInterface
     */
    public static function fromDate(DateTimeInterface $date, Calendar $calendar = Calendar::WESTERN): SignInterface;

    /**
     * Calculate zodiac from given unix timestamp date
     */
    public static function fromUnix(string|int $date, Calendar $calendar = Calendar::WESTERN): SignInterface;

    /**
     * Calculate zodiac from given Carbon date
     */
    public static function fromCarbon(CarbonInterface $date, Calendar $calendar = Calendar::WESTERN): SignInterface;

    /**
     * Calculate zodiac sign compatibility between given objects
     */
    public static function compare(SignInterface $zodiac, SignInterface $with): float;
}
