<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\AbstractZodiac;

class Capricorn extends AbstractZodiac
{
    public function __construct(
        protected int $startDay = 22,
        protected int $startMonth = 12,
        protected int $endDay = 20,
        protected int $endMonth = 1,
        protected string $name = 'capricorn',
        protected string $html = '&#9809;'
    ) {
        //
    }

    /**
     * Determine if given date matches Capricorn
     *
     * Capricorn extends over two different years so we need some special logic
     *
     * @param Carbon $date
     * @throws InvalidFormatException
     * @return bool
     */
    public function match(Carbon $date): bool
    {
        $start1 = Carbon::create($date->year, $this->startMonth, $this->startDay, 0, 0, 0);
        $end1 = Carbon::create($date->year, 12, 31, 23, 59, 59);

        $start2 = Carbon::create($date->year, 1, 1, 0, 0, 0);
        $end2 = Carbon::create($date->year, $this->endMonth, $this->endDay, 0, 0, 0)->addDay();

        return ($date->between($start1, $end1) || $date->between($start2, $end2));
    }
}
