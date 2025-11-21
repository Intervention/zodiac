<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Carbon\CarbonPeriod;
use Intervention\Zodiac\Exceptions\DateException;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;
use Intervention\Zodiac\AbstractSign as BaseSign;
use Intervention\Zodiac\Interfaces\SignInterface;

abstract class AbstractSign extends BaseSign
{
    /**
     * {@inheritdoc}
     *
     * @see SignInterface::period()
     */
    public function period(int $year): PeriodInterface
    {
        // get chinese new year for given year
        $start = NewYearCalculator::newYear($year);

        // if zodiac sign does not match it might be part of the last year
        if ($start->sign !== $this::class) {
            $start = NewYearCalculator::newYear($year - 1);
        }

        // if "part of last year zodiac sign" does not match either it is not the year of the sign
        if ($start->sign !== $this::class) {
            throw new DateException('The zodiac sign ' . $this->name() . ' does not appear in the year ' . $year);
        }

        // calculate the last day of the chinese zodiac sign which is the new years day next year
        $end = NewYearCalculator::newYear($start->date->year + 1);

        return new Period([
            CarbonPeriod::since($start->date)->until($end->date)->excludeEndDate(),
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
