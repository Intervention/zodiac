<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Koç',
    WesternSign::Taurus->value => 'Boğa',
    WesternSign::Gemini->value => 'İkizler',
    WesternSign::Cancer->value => 'Yengeç',
    WesternSign::Leo->value => 'Aslan',
    WesternSign::Virgo->value => 'Başak',
    WesternSign::Libra->value => 'Terazi',
    WesternSign::Scorpio->value => 'Akrep',
    WesternSign::Sagittarius->value => 'Yay',
    WesternSign::Capricorn->value => 'Oğlak',
    WesternSign::Aquarius->value => 'Kova',
    WesternSign::Pisces->value => 'Balık',

    ChineseSign::Rat->value => 'Sıçan',
    ChineseSign::Ox->value => 'Öküz',
    ChineseSign::Tiger->value => 'Kaplan',
    ChineseSign::Rabbit->value => 'Tavşan',
    ChineseSign::Dragon->value => 'Ejderha',
    ChineseSign::Snake->value => 'Yılan',
    ChineseSign::Horse->value => 'At',
    ChineseSign::Goat->value => 'Keçi',
    ChineseSign::Monkey->value => 'Maymun',
    ChineseSign::Rooster->value => 'Horoz',
    ChineseSign::Dog->value => 'Köpek',
    ChineseSign::Pig->value => 'Domuz',
];
