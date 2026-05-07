<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

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
use Intervention\Zodiac\Traits\HasSignRegistry;
use Stringable;
use Throwable;

enum ChineseSign: string implements SignInterface
{
    use HasSignRegistry;

    case Rat = 'Rat';
    case Ox = 'Ox';
    case Tiger = 'Tiger';
    case Rabbit = 'Rabbit';
    case Dragon = 'Dragon';
    case Snake = 'Snake';
    case Horse = 'Horse';
    case Goat = 'Goat';
    case Monkey = 'Monkey';
    case Rooster = 'Rooster';
    case Dog = 'Dog';
    case Pig = 'Pig';

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromDate(DateTimeInterface $date, Astrology $astrology = Astrology::CHINESE): self
    {
        if ($astrology !== Astrology::CHINESE) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
        }

        return self::findByDate(DateTimeImmutable::createFromInterface($date));
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::CHINESE): self
    {
        if ($astrology !== Astrology::CHINESE) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
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
    public static function fromUnix(string|int|float $date, Astrology $astrology = Astrology::CHINESE): self
    {
        if ($astrology !== Astrology::CHINESE) {
            throw new InvalidArgumentException('Chinese zodiac signs can only be created with chinese astrology');
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
            self::Rat => '🐀',
            self::Ox => '🐂',
            self::Tiger => '🐅',
            self::Rabbit => '🐇',
            self::Dragon => '🐉',
            self::Snake => '🐍',
            self::Horse => '🐎',
            self::Goat => '🐐',
            self::Monkey => '🐒',
            self::Rooster => '🐓',
            self::Dog => '🐕',
            self::Pig => '🐖',
        };
    }

    /**
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function period(int $year): PeriodInterface
    {
        $start = NewYearCalculator::newYear($year);

        if ($start->sign !== $this) {
            $start = NewYearCalculator::newYear($year - 1);
        }

        if ($start->sign !== $this) {
            throw new InvalidArgumentException(
                'The zodiac sign ' . $this->name() . ' does not appear in the year ' . $year,
            );
        }

        $end = NewYearCalculator::newYear((int) $start->date->format('Y') + 1);

        return new Period([
            new DateRange($start->date, $end->date, excludeEnd: true),
        ]);
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
