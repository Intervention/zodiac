<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Aquarius extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'aquarius';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9810;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 1, 'day' => 21];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 2, 'day' => 19];
}
