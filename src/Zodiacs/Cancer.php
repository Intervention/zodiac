<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Cancer extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     */
    protected string $name = 'cancer';

    /**
     * HTML code of zodiac sign
     */
    protected string $html = '&#9803;';

    /**
     * Start day of zodiac sign
     */
    protected array $start = ['month' => 6, 'day' => 22];

    /**
     * End day of zodiac sign
     */
    protected array $end = ['month' => 7, 'day' => 22];
}
