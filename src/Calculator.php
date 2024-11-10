<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use DateTimeInterface;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use InvalidArgumentException;
use ReflectionException;

class Calculator implements CalculatorInterface
{
    use Traits\CanTranslate;

    protected const ZODIAC_CLASSNAMES = [
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
     * @see ZodiacInterface::make()
     * @throws NotReadableException
     * @throws ReflectionException
     */
    public static function make(int|string|DateTimeInterface $date): ZodiacInterface
    {
        return (new self())->zodiac($date);
    }

    /**
     * {@inheritdoc}
     *
     * @throws NotReadableException
     * @see ZodiacInterface::zodiac()
     */
    public function zodiac(int|string|DateTimeInterface $date): ZodiacInterface
    {
        $date = $this->normalizeDate($date);

        foreach ($this::ZODIAC_CLASSNAMES as $classname) {
            try {
                $zodiac = new $classname();
                if ($date->isZodiac($zodiac)) {
                    return $zodiac->setTranslator($this->translator());
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
     * Normalze given date to Carbon object
     *
     * @param string|DateTimeInterface $date
     * @throws NotReadableException
     * @return ZodiacComparableDate
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
