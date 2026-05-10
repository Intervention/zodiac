<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\DateRange;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;
use Intervention\Zodiac\Western\PreConcreteWesternSign;

class Capricorn extends PreConcreteWesternSign
{
    protected string $name = 'Capricorn';
    protected string $html = '&#9809;';
    protected int $startDay = 22;
    protected int $startMonth = 12;
    protected int $endDay = 20;
    protected int $endMonth = 1;

    /**
     * Zodiac sign Capricorn spans several years and requires multiple periods.
     *
     * @see SignInterface::period()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function period(int $year): PeriodInterface
    {
        try {
            return new Period([
                new DateRange(
                    self::createDate($year - 1, $this->startMonth, $this->startDay),
                    self::createDate($year, $this->endMonth, $this->endDay),
                ),
                new DateRange(
                    self::createDate($year, $this->startMonth, $this->startDay),
                    self::createDate($year + 1, $this->endMonth, $this->endDay),
                ),
            ]);
        } catch (InvalidArgumentException $e) {
            throw new RuntimeException(
                'Unable to calculate period for zodiac sign ' . $this::class . ' in year ' . $year,
                previous: $e,
            );
        }
    }
}
