<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Libra extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'libra';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9806;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '9', 'day' => '24'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '10', 'day' => '23'];
}
