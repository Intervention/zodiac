<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Period;
use Intervention\Zodiac\AbstractSign as BaseSign;

abstract class AbstractSign extends BaseSign
{
    protected int $startDay;
    protected int $startMonth;
    protected int $endDay;
    protected int $endMonth;

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::period()
     */
    public function period(int $year): PeriodInterface
    {
        return new Period([
            CarbonPeriod::since(
                Carbon::create(
                    year: $year,
                    month: $this->startMonth,
                    day: $this->startDay,
                )
            )->until(
                Carbon::create(
                    year: $year,
                    month: $this->endMonth,
                    day: $this->endDay,
                )
            )
        ]);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::compatibility()
     */
    public function compatibility(SignInterface $sign): float
    {
        return call_user_func(new Compatibility(), $this, $sign);
    }
}
