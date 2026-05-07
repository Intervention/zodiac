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
use Intervention\Zodiac\Traits\CanCreateDate;
use Intervention\Zodiac\Traits\HasSignRegistry;
use Stringable;
use Throwable;

enum WesternSign: string implements SignInterface
{
    use CanCreateDate;
    use HasSignRegistry;

    case Aries = 'Aries';
    case Taurus = 'Taurus';
    case Gemini = 'Gemini';
    case Cancer = 'Cancer';
    case Leo = 'Leo';
    case Virgo = 'Virgo';
    case Libra = 'Libra';
    case Scorpio = 'Scorpio';
    case Sagittarius = 'Sagittarius';
    case Capricorn = 'Capricorn';
    case Aquarius = 'Aquarius';
    case Pisces = 'Pisces';

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromDate(DateTimeInterface $date, Astrology $astrology = Astrology::WESTERN): self
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Western zodiac signs can only be created with western astrology');
        }

        return self::findByDate(DateTimeImmutable::createFromInterface($date));
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::WESTERN): self
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Western zodiac signs can only be created with western astrology');
        }

        $date = (string) $date;

        if ($date === '') {
            throw new InvalidArgumentException('Unable to create zodiac from empty string');
        }

        try {
            $date = new DateTimeImmutable($date);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Unable to create zodiac from string "' . $date . '"', previous: $e);
        }

        return self::findByDate($date);
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function fromUnix(string|int|float $date, Astrology $astrology = Astrology::WESTERN): self
    {
        if ($astrology !== Astrology::WESTERN) {
            throw new InvalidArgumentException('Western zodiac signs can only be created with western astrology');
        }

        if (!is_numeric($date)) {
            throw new InvalidArgumentException(
                'Unable to create zodiac from non-numeric unix timestamp "' . $date . '"',
            );
        }

        try {
            return self::findByDate((new DateTimeImmutable())->setTimestamp((int) $date));
        } catch (Throwable) {
            throw new InvalidArgumentException('Unable to create zodiac from unix timestamp "' . $date . '"');
        }
    }

    public function html(): string
    {
        return match ($this) {
            self::Aries => '♈',
            self::Taurus => '♉',
            self::Gemini => '♊',
            self::Cancer => '♋',
            self::Leo => '♌',
            self::Virgo => '♍',
            self::Libra => '♎',
            self::Scorpio => '♏',
            self::Sagittarius => '♐',
            self::Capricorn => '♑',
            self::Aquarius => '♒',
            self::Pisces => '♓',
        };
    }

    /**
     * @throws InvalidArgumentException
     */
    public function period(int $year): PeriodInterface
    {
        if ($this === self::Capricorn) {
            return new Period([
                new DateRange(
                    self::createDate($year - 1, 12, 22),
                    self::createDate($year, 1, 20),
                ),
                new DateRange(
                    self::createDate($year, 12, 22),
                    self::createDate($year + 1, 1, 20),
                ),
            ]);
        }

        [$startMonth, $startDay] = $this->startDate();
        [$endMonth, $endDay] = $this->endDate();

        return new Period([
            new DateRange(
                self::createDate($year, $startMonth, $startDay),
                self::createDate($year, $endMonth, $endDay),
            ),
        ]);
    }

    /**
     * @return array{int, int}
     */
    private function startDate(): array
    {
        return match ($this) {
            self::Aries => [3, 21],
            self::Taurus => [4, 21],
            self::Gemini => [5, 22],
            self::Cancer => [6, 22],
            self::Leo => [7, 23],
            self::Virgo => [8, 24],
            self::Libra => [9, 24],
            self::Scorpio => [10, 24],
            self::Sagittarius => [11, 23],
            self::Capricorn => [12, 22],
            self::Aquarius => [1, 21],
            self::Pisces => [2, 20],
        };
    }

    /**
     * @return array{int, int}
     */
    private function endDate(): array
    {
        return match ($this) {
            self::Aries => [4, 20],
            self::Taurus => [5, 21],
            self::Gemini => [6, 21],
            self::Cancer => [7, 22],
            self::Leo => [8, 23],
            self::Virgo => [9, 23],
            self::Libra => [10, 23],
            self::Scorpio => [11, 22],
            self::Sagittarius => [12, 21],
            self::Capricorn => [1, 20],
            self::Aquarius => [2, 19],
            self::Pisces => [3, 20],
        };
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function compatibility(SignInterface $sign): float
    {
        return call_user_func(new Compatibility(), $this, $sign);
    }
}
