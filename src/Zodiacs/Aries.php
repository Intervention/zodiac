<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Aries extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    protected string $name = 'aries';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    protected string $html = '&#9800;';

    /**
     * Start day of zodiac sign
     */
    protected array $start = ['month' => 3, 'day' => 21];

    /**
     * End day of zodiac sign
     */
    protected array $end = ['month' => 4, 'day' => 20];
}
