<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Gemini extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    protected string $name = 'gemini';

    /**
     * HTML code of zodiac sign
     */
    protected string $html = '&#9802;';

    /**
     * Start day of zodiac sign
     */
    protected array $start = ['month' => 5, 'day' => 22];

    /**
     * End day of zodiac sign
     */
    protected array $end = ['month' => 6, 'day' => 21];
}
