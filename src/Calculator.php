<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Intervention\Zodiac\Exceptions\DateException;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Stringable;
use Throwable;

class Calculator implements CalculatorInterface
{
    protected static Calendar $calendar = Calendar::WESTERN;

    /**
     * Create new calculator instance with calender to calculate with
     */
    public function __construct(Calendar $calendar = Calendar::WESTERN)
    {
        static::$calendar = $calendar;
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::withCalendar()
     */
    public static function withCalendar(Calendar $calendar): self
    {
        return new self($calendar);
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromString()
     */
    public static function fromString(string|Stringable $date, ?Calendar $calendar = null): SignInterface
    {
        // normalize date
        $date = (string) $date;

        if ($date === '') { // empty string is allowed in Carbon::parse() but not here
            throw new NotReadableException('Unable to create zodiac from empty string.');
        }

        try {
            return self::fromCarbon(
                date: Carbon::parse($date),
                calendar: $calendar ?: self::$calendar
            );
        } catch (Throwable) {
            throw new NotReadableException('Unable to create zodiac from string (' . $date . ').');
        }
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromDate()
     */
    public static function fromDate(DateTimeInterface $date, ?Calendar $calendar = null): SignInterface
    {
        return self::fromCarbon(
            date: new Carbon($date),
            calendar: $calendar ?: self::$calendar
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromUnix()
     */
    public static function fromUnix(string|int $date, ?Calendar $calendar = null): SignInterface
    {
        try {
            return self::fromCarbon(
                date: Carbon::createFromTimestamp($date),
                calendar: $calendar ?: self::$calendar
            );
        } catch (Throwable) {
            throw new NotReadableException('Unable to create zodiac from unix timestamp (' . $date . ').');
        }
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromCarbon()
     */
    public static function fromCarbon(CarbonInterface $date, ?Calendar $calendar = null): SignInterface
    {
        foreach (($calendar ?: self::$calendar)->signClassnames() as $classname) {
            $sign = new $classname();

            if (!($sign instanceof SignInterface)) {
                continue;
            }

            try {
                if ($sign->period($date->year)->contains($date)) {
                    return $sign;
                }
            } catch (DateException) {
                // next sign
            }
        }

        throw new NotReadableException('Unable to calculate zodiac from CarbonInterface (' . (string) $date . ')');
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::compare()
     */
    public static function compare(SignInterface $zodiac, SignInterface $with): float
    {
        return $zodiac->compatibility($with);
    }
}
