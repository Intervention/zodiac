<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use DateTimeInterface;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Intervention\Zodiac\Interfaces\TranslatableInterface;
use Stringable;
use Throwable;

class Calculator implements CalculatorInterface, TranslatableInterface
{
    use Traits\CanTranslate;

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromString()
     */
    public static function fromString(string|Stringable $date, Calendar $calendar = Calendar::WESTERN): ZodiacInterface
    {
        // normalize types
        $date = $date instanceof Stringable ? $date->__toString() : $date;

        if ($date === '') { // empty string is allowed in Carbon::parse() but not here
            throw new NotReadableException('Unable to create zodiac from empty string.');
        }

        try {
            return self::fromComparableDate(
                date: new ZodiacComparableDate(Carbon::parse($date)),
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
    public static function fromDate(DateTimeInterface $date, Calendar $calendar = Calendar::WESTERN): ZodiacInterface
    {
        return self::fromComparableDate(
            date: new ZodiacComparableDate($date),
            calendar: $calendar
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromUnix()
     */
    public static function fromUnix(string|int $date, Calendar $calendar = Calendar::WESTERN): ZodiacInterface
    {
        return self::fromComparableDate(
            date: new ZodiacComparableDate(Carbon::createFromTimestamp($date)),
            calendar: $calendar
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::compare()
     */
    public static function compare(ZodiacInterface $zodiac, ZodiacInterface $with): float
    {
        return $zodiac->compatibility($with);
    }

    /**
     * Calcuate zodiac from given comparable date
     */
    private static function fromComparableDate(ZodiacComparableDate $date, Calendar $calendar): ZodiacInterface
    {
        foreach ($calendar->range($date->year()) as $classname) {
            $zodiac = new $classname();
            if (
                $zodiac instanceof ZodiacInterface &&
                $zodiac instanceof TranslatableInterface &&
                $date->isZodiac($zodiac)
            ) {
                $zodiac->setTranslator(self::$translator);

                return $zodiac;
            }
        }

        throw new NotReadableException(
            'Unable to create zodiac from value (' . $date . ')'
        );
    }
}
