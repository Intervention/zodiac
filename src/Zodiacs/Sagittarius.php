<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Sagittarius extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'sagittarius';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9808;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 11, 'day' => 23];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 12, 'day' => 21];
}
