<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Aries',
    WesternSign::Taurus->value => 'Taurus',
    WesternSign::Gemini->value => 'Gemini',
    WesternSign::Cancer->value => 'Cancer',
    WesternSign::Leo->value => 'Leo',
    WesternSign::Virgo->value => 'Virgo',
    WesternSign::Libra->value => 'Libra',
    WesternSign::Scorpio->value => 'Scorpio',
    WesternSign::Sagittarius->value => 'Sagittarius',
    WesternSign::Capricorn->value => 'Capricorn',
    WesternSign::Aquarius->value => 'Aquarius',
    WesternSign::Pisces->value => 'Pisces',

    ChineseSign::Rat->value => 'Rat',
    ChineseSign::Ox->value => 'Ox',
    ChineseSign::Tiger->value => 'Tiger',
    ChineseSign::Rabbit->value => 'Rabbit',
    ChineseSign::Dragon->value => 'Dragon',
    ChineseSign::Snake->value => 'Snake',
    ChineseSign::Horse->value => 'Horse',
    ChineseSign::Goat->value => 'Goat',
    ChineseSign::Monkey->value => 'Monkey',
    ChineseSign::Rooster->value => 'Rooster',
    ChineseSign::Dog->value => 'Dog',
    ChineseSign::Pig->value => 'Pig',
];
