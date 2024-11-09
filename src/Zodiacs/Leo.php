<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Leo extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    protected string $name = 'leo';

    /**
     * HTML code of zodiac sign
     */
    protected string $html = '&#9804;';

    /**
     * Start day of zodiac sign
     */
    protected array $start = ['month' => 7, 'day' => 23];

    /**
     * End day of zodiac sign
     */
    protected array $end = ['month' => 8, 'day' => 23];
}
