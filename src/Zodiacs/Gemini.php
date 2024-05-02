<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Gemini extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'gemini';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9802;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 5, 'day' => 22];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 6, 'day' => 21];
}
