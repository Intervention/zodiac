<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese\Signs;

use Carbon\CarbonPeriod;
use Intervention\Zodiac\Chinese\NewYearCalculator;
use Intervention\Zodiac\Exceptions\DateException;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;
use Intervention\Zodiac\AbstractSign;

abstract class Sign extends AbstractSign
{
    /**
     * {@inheritdoc}
     *
     * @see SignInterface::period()
     */
    public function period(int $year): PeriodInterface
    {
        [$start, $startClassname] = NewYearCalculator::newYear($year);

        if ($startClassname !== $this::class) {
            [$start, $startClassname] = NewYearCalculator::newYear($year - 1);
        }

        if ($startClassname !== $this::class) {
            throw new DateException('The zodiac sign ' . $this->name() . ' does not appear in the year ' . $year);
        }

        [$end] = NewYearCalculator::newYear($start->year + 1);

        return new Period([
            CarbonPeriod::since($start)->until($end)->excludeEndDate(),
        ]);
    }
}
