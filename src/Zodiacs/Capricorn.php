<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\AbstractZodiac;

class Capricorn extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'capricorn';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9809;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 12, 'day' => 22];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 1, 'day' => 20];

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
        $start1 = Carbon::create($date->year, $this->start['month'], $this->start['day'], 0, 0, 0);
        $end1 = Carbon::create($date->year, 12, 31, 23, 59, 59);

        $start2 = Carbon::create($date->year, 1, 1, 0, 0, 0);
        $end2 = Carbon::create($date->year, $this->end['month'], $this->end['day'], 0, 0, 0)->addDay();

        return ($date->between($start1, $end1) || $date->between($start2, $end2));
    }
}
