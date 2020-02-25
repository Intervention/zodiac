<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Aries extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'aries';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9800;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '3', 'day' => '21'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '4', 'day' => '20'];
}
