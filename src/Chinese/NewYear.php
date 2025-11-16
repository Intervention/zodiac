<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;

class NewYear
{
    public CarbonInterface $date;
    public string $sign;

    public function __construct(int $year, int $month, int $day, string $sign)
    {
        $this->date = Carbon::createFromDate($year, $month, $day)->setTime(0, 0, 0);
        $this->sign = $sign;
    }

    public static function create(int $year, int $month, int $day, string $sign): self
    {
        return new self($year, $month, $day, $sign);
    }

    public function date(): CarbonInterface
    {
        return $this->date;
    }

    public function sign(): SignInterface
    {
        $sign = new $this->sign();

        if (!($sign instanceof SignInterface)) {
            throw new RuntimeException('Type of zodiac sign does not match');
        }

        return $sign;
    }
}
