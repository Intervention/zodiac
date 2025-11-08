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
     * All western zodiac classes
     *
     * @var array<string>
     */
    protected static array $zodiacClassnames = [
        Zodiacs\Aquarius::class,
        Zodiacs\Aries::class,
        Zodiacs\Cancer::class,
        Zodiacs\Capricorn::class,
        Zodiacs\Gemini::class,
        Zodiacs\Leo::class,
        Zodiacs\Libra::class,
        Zodiacs\Pisces::class,
        Zodiacs\Sagittarius::class,
        Zodiacs\Scorpio::class,
        Zodiacs\Taurus::class,
        Zodiacs\Virgo::class,
    ];

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromString()
     */
    public static function fromString(string|Stringable $date): ZodiacInterface
    {
        // normalize types
        $date = $date instanceof Stringable ? $date->__toString() : $date;

        if ($date === '') { // empty string is allowed in Carbon::parse() but not here
            throw new NotReadableException('Unable to create zodiac from empty string.');
        }

        try {
            return self::fromComparableDate(
                new ZodiacComparableDate(
                    Carbon::parse($date)
                )
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
    public static function fromDate(DateTimeInterface $date): ZodiacInterface
    {
        return self::fromComparableDate(
            new ZodiacComparableDate($date)
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromUnix()
     */
    public static function fromUnix(string|int $date): ZodiacInterface
    {
        return self::fromComparableDate(
            new ZodiacComparableDate(
                Carbon::createFromTimestamp($date)
            )
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
    private static function fromComparableDate(ZodiacComparableDate $date): ZodiacInterface
    {
        foreach (static::$zodiacClassnames as $classname) {
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
