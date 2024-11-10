<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Zodiacs\Capricorn;

class CarbonExtension
{
    /**
     * Extends Carbon object with metho 'isZodiac' to determin if the current Carbon
     * instance matches given zodiac sign
     */
    public function isInterventionZodiac(): callable
    {
        return static function (ZodiacInterface $zodiac) {
            $birthday = self::this();

            // The zodiac sign Capricorn spans over the turn of
            // the year and requires special treatment.
            if ($zodiac instanceof Capricorn) {
                $period1 = [
                    $zodiac
                        ->start()
                        ->setYear($birthday->year),
                    $zodiac
                        ->end()
                        ->setYear($birthday->year)
                        ->setMonth(12)
                        ->setDay(31)
                        ->setTime(23, 59, 59)
                ];

                $period2 = [
                    $zodiac
                        ->start()
                        ->setYear($birthday->year)
                        ->setMonth(1)
                        ->setDay(1),
                    $zodiac
                        ->end()
                        ->setYear($birthday->year)
                        ->addDay()
                ];

                return ($birthday->between(...$period1) || $birthday->between(...$period2));
            }

            return $birthday->between(
                $zodiac->start()->setYear($birthday->year),
                $zodiac->end()->setYear($birthday->year)
            );
        };
    }
}
