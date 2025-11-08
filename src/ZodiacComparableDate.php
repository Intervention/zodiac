<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use DateTimeInterface;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Zodiacs\Western\Capricorn;
use Stringable;

class ZodiacComparableDate implements Stringable
{
    /**
     * Date to compare against
     */
    protected Carbon $date;

    /**
     * Create new instance
     */
    public function __construct(DateTimeInterface $date)
    {
        // normalize date to Carbon instance
        $this->date = $date instanceof Carbon ? $date : Carbon::parse($date);
    }

    /**
     * Determine if the current date matches given zodiac sign
     *
     * @throws InvalidFormatException
     * @throws RuntimeException
     */
    public function isZodiac(ZodiacInterface $zodiac): bool
    {
        // The zodiac sign Capricorn spans over the turn of
        // the year and requires special treatment.
        if ($zodiac instanceof Capricorn) {
            $period1 = [
                $zodiac
                    ->start()
                    ->setYear($this->date->year),
                $zodiac
                    ->end()
                    ->setYear($this->date->year)
                    ->setMonth(12)
                    ->setDay(31)
                    ->setTime(23, 59, 59)
            ];

            $period2 = [
                $zodiac
                    ->start()
                    ->setYear($this->date->year)
                    ->setMonth(1)
                    ->setDay(1),
                $zodiac
                    ->end()
                    ->setYear($this->date->year)
                    ->addDay()
            ];

            return $this->date->between(...$period1) || $this->date->between(...$period2);
        }

        // all other zodiac signs
        return $this->date->between(
            $zodiac->start()->setYear($this->date->year),
            $zodiac->end()->setYear($this->date->year)
        );
    }

    /**
     * Cast object to string
     */
    public function __toString(): string
    {
        return (string) $this->date;
    }
}
