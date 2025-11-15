<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Stringable;
use Throwable;

class Calculator implements CalculatorInterface
{
    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromString()
     */
    public static function fromString(string|Stringable $date, Calendar $calendar = Calendar::WESTERN): SignInterface
    {
        // normalize date
        $date = (string) $date;

        if ($date === '') { // empty string is allowed in Carbon::parse() but not here
            throw new NotReadableException('Unable to create zodiac from empty string.');
        }

        try {
            return self::fromCarbon(
                date: Carbon::parse($date),
                calendar: $calendar
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
    public static function fromDate(DateTimeInterface $date, Calendar $calendar = Calendar::WESTERN): SignInterface
    {
        return self::fromCarbon(
            date: new Carbon($date),
            calendar: $calendar
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromUnix()
     */
    public static function fromUnix(string|int $date, Calendar $calendar = Calendar::WESTERN): SignInterface
    {
        try {
            return self::fromCarbon(
                date: Carbon::createFromTimestamp($date),
                calendar: $calendar
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
    public static function fromCarbon(CarbonInterface $date, Calendar $calendar = Calendar::WESTERN): SignInterface
    {
        $signs = array_filter($calendar->signClassnames(), function (string $classname) use ($date): bool {
            try {
                return (new $classname())->period($date->year)->contains($date);
            } catch (Throwable) {
                return false;
            }
        });

        // only one sing may remain
        if (count($signs) !== 1) {
            throw new NotReadableException('Unable to calculate zodiac');
        }

        return new $signs[array_key_first($signs)]();
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
