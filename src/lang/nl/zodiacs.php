<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Ram',
    WesternSign::Taurus->value => 'Stier',
    WesternSign::Gemini->value => 'Tweelingen',
    WesternSign::Cancer->value => 'Kreeft',
    WesternSign::Leo->value => 'Leeuw',
    WesternSign::Virgo->value => 'Maagd',
    WesternSign::Libra->value => 'Weegschaal',
    WesternSign::Scorpio->value => 'Schorpioen',
    WesternSign::Sagittarius->value => 'Boogschutter',
    WesternSign::Capricorn->value => 'Steenbok',
    WesternSign::Aquarius->value => 'Waterman',
    WesternSign::Pisces->value => 'Vissen',

    ChineseSign::Rat->value => 'Rat',
    ChineseSign::Ox->value => 'Os',
    ChineseSign::Tiger->value => 'Tijger',
    ChineseSign::Rabbit->value => 'Konijn',
    ChineseSign::Dragon->value => 'Draak',
    ChineseSign::Snake->value => 'Slang',
    ChineseSign::Horse->value => 'Paad',
    ChineseSign::Goat->value => 'Geit',
    ChineseSign::Monkey->value => 'Aap',
    ChineseSign::Rooster->value => 'Haan',
    ChineseSign::Dog->value => 'Hond',
    ChineseSign::Pig->value => 'Varken',
];
