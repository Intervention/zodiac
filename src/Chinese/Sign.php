<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Carbon\CarbonInterface;
use Carbon\CarbonPeriod;
use DateTimeInterface;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;
use Intervention\Zodiac\Sign as BaseSign;
use Intervention\Zodiac\Interfaces\SignInterface;
use Stringable;

abstract class Sign extends BaseSign
{
    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromCarbon()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromCarbon(CarbonInterface $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
        }

        return parent::fromCarbon($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromString()
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
        }

        return parent::fromString($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromUnix()
     */
    public static function fromUnix(string|int|float $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
        }

        return parent::fromUnix($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromDate()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromDate(DateTimeInterface $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
        }

        return parent::fromDate($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::period()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
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
            throw new InvalidArgumentException(
                'The zodiac sign ' . $this->name() . ' does not appear in the year ' . $year,
            );
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
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function compatibility(SignInterface $sign): float
    {
        return call_user_func(new Compatibility(), $this, $sign);
    }
}
