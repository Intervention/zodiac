<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\DateRange;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Period;
use Intervention\Zodiac\Sign as BaseSign;
use Stringable;

abstract class Sign extends BaseSign
{
    protected int $startDay;
    protected int $startMonth;
    protected int $endDay;
    protected int $endMonth;

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
            throw new InvalidArgumentException('Western zodiac signs can only be created with western astrology');
        }

        return parent::fromDate($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromString()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Western zodiac signs can only be created with western astrology');
        }

        return parent::fromString($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromUnix()
     *
     * @throws InvalidArgumentException
     */
    public static function fromUnix(string|int|float $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Western zodiac signs can only be created with western astrology');
        }

        return parent::fromUnix($date, $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::period()
     *
     * @throws InvalidArgumentException
     */
    public function period(int $year): PeriodInterface
    {
        try {
            return new Period([
                new DateRange(
                    new DateTimeImmutable(sprintf('%04d-%02d-%02d', $year, $this->startMonth, $this->startDay)),
                    new DateTimeImmutable(sprintf('%04d-%02d-%02d', $year, $this->endMonth, $this->endDay)),
                ),
            ]);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Failed to created period for year ' . $year, previous: $e);
        }
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
