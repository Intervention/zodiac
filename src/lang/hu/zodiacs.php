<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Kos',
    WesternSign::Taurus->value => 'Bika',
    WesternSign::Gemini->value => 'Ikrek',
    WesternSign::Cancer->value => 'Rák',
    WesternSign::Leo->value => 'Oroszlán',
    WesternSign::Virgo->value => 'Szűz',
    WesternSign::Libra->value => 'Mérleg',
    WesternSign::Scorpio->value => 'Skorpió',
    WesternSign::Sagittarius->value => 'Nyilas',
    WesternSign::Capricorn->value => 'Bak',
    WesternSign::Aquarius->value => 'Vízöntő',
    WesternSign::Pisces->value => 'Halak',

    ChineseSign::Rat->value => 'Patkány',
    ChineseSign::Ox->value => 'Ökör',
    ChineseSign::Tiger->value => 'Tigris',
    ChineseSign::Rabbit->value => 'Nyúl',
    ChineseSign::Dragon->value => 'Sárkány',
    ChineseSign::Snake->value => 'Kígyó',
    ChineseSign::Horse->value => 'Ló',
    ChineseSign::Goat->value => 'Kecske',
    ChineseSign::Monkey->value => 'Majom',
    ChineseSign::Rooster->value => 'Kakas',
    ChineseSign::Dog->value => 'Kutya',
    ChineseSign::Pig->value => 'Disznó',
];
