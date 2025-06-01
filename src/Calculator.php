<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use DateTimeInterface;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Intervention\Zodiac\Interfaces\TranslatableInterface;
use InvalidArgumentException;

class Calculator implements CalculatorInterface, TranslatableInterface
{
    use Traits\CanTranslate;

    /**
     * @var array<string>
     */
    protected array $zodiac_classnames = [
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
     * @see ZodiacInterface::zodiac()
     *
     * @throws NotReadableException
     * @throws RuntimeException
     */
    public static function zodiac(int|string|DateTimeInterface $date): ZodiacInterface
    {
        $calculator = new self();
        $date = $calculator->normalizeDate($date);

        foreach ($calculator->zodiac_classnames as $classname) {
            try {
                $zodiac = new $classname();
                if (
                    ($zodiac instanceof ZodiacInterface) &&
                    ($zodiac instanceof TranslatableInterface) &&
                    $date->isZodiac($zodiac)
                ) {
                    $zodiac->setTranslator($calculator->translator());

                    return $zodiac;
                }
            } catch (InvalidFormatException | InvalidArgumentException) {
                // try next zodiac
            }
        }

        throw new NotReadableException(
            'Unable to create zodiac from value (' . $date . ')'
        );
    }

    /**
     * Alias of zodiac()
     *
     * @see self::zodiac()
     *
     * @throws NotReadableException
     * @throws RuntimeException
     */
    public static function make(int|string|DateTimeInterface $date): ZodiacInterface
    {
        return (new self())->zodiac($date);
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::compare()
     */
    public static function compare(ZodiacInterface $zodiac1, ZodiacInterface $zodiac2): float
    {
        return $zodiac1->compatibility($zodiac2);
    }

    /**
     * Normalze given date to Carbon object
     *
     * @throws NotReadableException
     */
    private function normalizeDate(int|string|DateTimeInterface $date): ZodiacComparableDate
    {
        try {
            $date = match (true) {
                is_numeric($date) => Carbon::createFromTimestamp($date),
                default => Carbon::parse($date),
            };
        } catch (InvalidFormatException | InvalidArgumentException) {
            throw new NotReadableException('Unable to create zodiac from value.');
        }

        return new ZodiacComparableDate($date);
    }
}
