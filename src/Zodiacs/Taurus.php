<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Taurus extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'taurus';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9801;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 4, 'day' => 21];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 5, 'day' => 21];
}
