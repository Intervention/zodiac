<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Scorpio extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'scorpio';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9807;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 10, 'day' => 24];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 11, 'day' => 22];
}
