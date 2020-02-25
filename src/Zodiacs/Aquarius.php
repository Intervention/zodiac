<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Aquarius extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'aquarius';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9810;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '1', 'day' => '21'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '2', 'day' => '19'];
}
