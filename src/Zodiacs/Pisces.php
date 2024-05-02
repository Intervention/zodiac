<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Pisces extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'pisces';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9811;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 2, 'day' => 20];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 3, 'day' => 20];
}
