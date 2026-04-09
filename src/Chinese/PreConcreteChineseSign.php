<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use DateTimeInterface;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Chinese\Sign as ChineseSign;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Stringable;

abstract class PreConcreteChineseSign extends ChineseSign
{
    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromDate()
     */
    public static function fromDate(DateTimeInterface $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        $sign = parent::fromDate($date, $astrology);

        if ($sign::class !== static::class) {
            throw new InvalidArgumentException(
                'The date provided does not correspond to the zodiac sign ' . static::class,
            );
        }

        return $sign;
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromString()
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        $sign = parent::fromString($date, $astrology);

        if ($sign::class !== static::class) {
            throw new InvalidArgumentException(
                'The date provided does not correspond to the zodiac sign ' . static::class,
            );
        }

        return $sign;
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromUnix()
     */
    public static function fromUnix(string|int|float $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        $sign = parent::fromUnix($date, $astrology);

        if ($sign::class !== static::class) {
            throw new InvalidArgumentException(
                'The date provided does not correspond to the zodiac sign ' . static::class,
            );
        }


        return $sign;
    }
}
