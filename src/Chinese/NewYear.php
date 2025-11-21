<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Intervention\Zodiac\Chinese\AbstractSign as ChineseZodiacSign;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;

class NewYear
{
    /**
     * Date of new years day
     */
    public CarbonInterface $date;

    /**
     * Chinese zodiac sign of the coming year
     */
    public string $sign;

    /**
     * Create new instance
     */
    public function __construct(int $year, int $month, int $day, string $sign)
    {
        $this->date = Carbon::createFromDate($year, $month, $day)->setTime(0, 0, 0);
        $this->sign = $sign;
    }

    /**
     * Get date as carbon instance
     */
    public function date(): CarbonInterface
    {
        return $this->date;
    }

    /**
     * Get new year's zodiac sign as SignInterface instance
     */
    public function sign(): SignInterface
    {
        $sign = new $this->sign();

        if (!($sign instanceof ChineseZodiacSign)) {
            throw new RuntimeException('Type of zodiac sign does not match');
        }

        return $sign;
    }
}
