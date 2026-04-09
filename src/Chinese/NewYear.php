<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\Chinese\Sign as ChineseSign;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;

class NewYear
{
    /**
     * Date of new years day.
     */
    public CarbonInterface $date;

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
        try {
            $this->date = Carbon::createFromDate($year, $month, $day)->setTime(0, 0, 0);
        } catch (InvalidFormatException $e) {
            throw new InvalidArgumentException('Failed to create instance of ' . self::class, previous: $e);
        }

        $this->sign = $sign;
    }

    /**
     * Get date as carbon instance.
     */
    public function date(): CarbonInterface
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
