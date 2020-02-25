<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Virgo extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'virgo';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9805;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '8', 'day' => '24'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '9', 'day' => '23'];
}
