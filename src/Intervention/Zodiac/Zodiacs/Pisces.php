<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Pisces extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'pisces';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9811;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '2', 'day' => '20'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '3', 'day' => '20'];
}
