<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Gemini extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'gemini';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9802;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '5', 'day' => '22'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '6', 'day' => '21'];
}
