<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;

class Capricorn extends Sign
{
    protected string $name = 'Capricorn';
    protected string $html = '&#9809;';
    protected int $startDay = 22;
    protected int $startMonth = 12;
    protected int $endDay = 20;
    protected int $endMonth = 1;

    /**
     * Zodiac sign Capricorn spans several years and requires multiple periods
     *
     * @see SignInterface::period()
     */
    public function period(int $year): PeriodInterface
    {
        return new Period([
            CarbonPeriod::since(
                Carbon::create(
                    year: $year - 1,
                    month: $this->startMonth,
                    day: $this->startDay,
                )
            )->until(
                Carbon::create(
                    year: $year,
                    month: $this->endMonth,
                    day: $this->endDay,
                )
            ),
            CarbonPeriod::since(
                Carbon::create(
                    year: $year,
                    month: $this->startMonth,
                    day: $this->startDay,
                )
            )->until(
                Carbon::create(
                    year: $year + 1,
                    month: $this->endMonth,
                    day: $this->endDay,
                )
            ),
        ]);
    }
}
