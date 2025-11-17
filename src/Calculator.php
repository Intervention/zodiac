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
    use Traits\CanTranslate;

    protected static Astrology $astrology = Astrology::WESTERN;

    /**
     * Create new calculator instance with calender to calculate with
     */
    public function __construct(Astrology $astrology = Astrology::WESTERN)
    {
        static::$astrology = $astrology;
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::withAstrology()
     */
    public static function withAstrology(Astrology $astrology): self
    {
        return new self($astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromString()
     */
    public static function fromString(string|Stringable $date, ?Astrology $astrology = null): SignInterface
    {
        // normalize date
        $date = (string) $date;

        if ($date === '') { // empty string is allowed in Carbon::parse() but not here
            throw new NotReadableException('Unable to create zodiac from empty string.');
        }

        try {
            return self::fromCarbon(
                date: Carbon::parse($date),
                astrology: $astrology ?: self::$astrology
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
    public static function fromDate(DateTimeInterface $date, ?Astrology $astrology = null): SignInterface
    {
        return self::fromCarbon(
            date: new Carbon($date),
            astrology: $astrology ?: self::$astrology
        );
    }

    /*
     * {@inheritdoc}
     *
     * @see CalculatorInterface::fromUnix()
     */
    public static function fromUnix(string|int $date, ?Astrology $astrology = null): SignInterface
    {
        try {
            return self::fromCarbon(
                date: Carbon::createFromTimestamp($date),
                astrology: $astrology ?: self::$astrology
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
    public static function fromCarbon(CarbonInterface $date, ?Astrology $astrology = null): SignInterface
    {
        // try each zodiac sign of the given (or default) astrology
        foreach (($astrology ?: self::$astrology)->signClassnames() as $classname) {
            $sign = new $classname();

            if (!($sign instanceof SignInterface)) {
                continue;
            }

            try {
                // check if the period of the zodiac sign matches the given date
                if ($sign->period($date->year)->contains($date)) {
                    return $sign;
                }
            } catch (DateException) {
                // try next sign
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
