<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Virgo extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    protected string $name = 'virgo';

    /**
     * HTML code of zodiac sign
     */
    protected string $html = '&#9805;';

    /**
     * Start of zodiac sign
     */
    protected array $start = ['month' => 8, 'day' => 24];

    /**
     * End of zodiac sign
     */
    protected array $end = ['month' => 9, 'day' => 23];
}
