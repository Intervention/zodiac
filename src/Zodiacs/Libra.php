<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Libra extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'libra';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9806;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 9, 'day' => 24];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 10, 'day' => 23];
}
