<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Sagittarius extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'sagittarius';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9808;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '11', 'day' => '23'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '12', 'day' => '21'];
}
