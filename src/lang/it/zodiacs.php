<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Ariete',
    WesternSign::Taurus->value => 'Toro',
    WesternSign::Gemini->value => 'Gemelli',
    WesternSign::Cancer->value => 'Cancro',
    WesternSign::Leo->value => 'Leone',
    WesternSign::Virgo->value => 'Vergine',
    WesternSign::Libra->value => 'Bilancia',
    WesternSign::Scorpio->value => 'Scorpione',
    WesternSign::Sagittarius->value => 'Sagittario',
    WesternSign::Capricorn->value => 'Capricorno',
    WesternSign::Aquarius->value => 'Acquario',
    WesternSign::Pisces->value => 'Pesci',

    ChineseSign::Rat->value => 'Ratto',
    ChineseSign::Ox->value => 'Bue',
    ChineseSign::Tiger->value => 'Tigre',
    ChineseSign::Rabbit->value => 'Coniglio',
    ChineseSign::Dragon->value => 'Drago',
    ChineseSign::Snake->value => 'Serpente',
    ChineseSign::Horse->value => 'Cavallo',
    ChineseSign::Goat->value => 'Capra',
    ChineseSign::Monkey->value => 'Scimmia',
    ChineseSign::Rooster->value => 'Gallo',
    ChineseSign::Dog->value => 'Cane',
    ChineseSign::Pig->value => 'Maiale',
];
