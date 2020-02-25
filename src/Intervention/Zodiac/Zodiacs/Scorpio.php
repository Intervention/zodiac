<?php

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Scorpio extends AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name = 'scorpio';

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html = '&#9807;';

    /**
     * Start day of zodiac sign
     *
     * @var array
     */
    public $start = ['month' => '10', 'day' => '24'];

    /**
     * End day of zodiac sign
     *
     * @var array
     */
    public $end = ['month' => '11', 'day' => '22'];
}
