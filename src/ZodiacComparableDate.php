<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Zodiacs\Capricorn;

class ZodiacComparableDate
{
    /**
     * Create new instance
     *
     * @param Carbon $date
     * @return void
     */
    public function __construct(protected Carbon $date)
    {
        //
    }

    /**
     * Determine if the current instance matches given zodiac sign
     *
     * @param ZodiacInterface $zodiac
     * @throws InvalidFormatException
     * @return bool
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

            return ($this->date->between(...$period1) || $this->date->between(...$period2));
        }

        return $this->date->between(
            $zodiac->start()->setYear($this->date->year),
            $zodiac->end()->setYear($this->date->year)
        );
    }

    /**
     * Cast object to string
     *
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->date;
    }
}
