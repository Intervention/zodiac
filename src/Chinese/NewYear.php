<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use DateTimeImmutable;
use DateTimeInterface;
use Intervention\Zodiac\Chinese\Sign as ChineseSign;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Traits\CanCreateDate;

class NewYear
{
    use CanCreateDate;

    /**
     * Date of new years day.
     */
    public DateTimeImmutable $date;

    /**
     * Chinese zodiac sign of the coming year.
     */
    public string $sign;

    /**
     * Create new instance.
     *
     * @throws InvalidArgumentException
     */
    public function __construct(int $year, int $month, int $day, string $sign)
    {
        $this->date = self::createDate($year, $month, $day);
        $this->sign = $sign;
    }

    /**
     * Get date as DateTimeInterface instance.
     */
    public function date(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Get new year's zodiac sign as SignInterface instance.
     *
     * @throws RuntimeException
     */
    public function sign(): SignInterface
    {
        $sign = new $this->sign();

        if (!$sign instanceof ChineseSign) {
            throw new RuntimeException('Type of zodiac sign does not match');
        }

        return $sign;
    }
}
