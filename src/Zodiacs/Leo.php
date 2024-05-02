<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Leo extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    public string $name = 'leo';

    /**
     * HTML code of zodiac sign
     */
    public string $html = '&#9804;';

    /**
     * Start day of zodiac sign
     */
    public array $start = ['month' => 7, 'day' => 23];

    /**
     * End day of zodiac sign
     */
    public array $end = ['month' => 8, 'day' => 23];
}
