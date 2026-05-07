<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Ovan',
    WesternSign::Taurus->value => 'Bik',
    WesternSign::Gemini->value => 'Blizanci',
    WesternSign::Cancer->value => 'Rak',
    WesternSign::Leo->value => 'Lav',
    WesternSign::Virgo->value => 'Djevica',
    WesternSign::Libra->value => 'Vaga',
    WesternSign::Scorpio->value => 'Škorpion',
    WesternSign::Sagittarius->value => 'Strijelac',
    WesternSign::Capricorn->value => 'Jarac',
    WesternSign::Aquarius->value => 'Vodenjak',
    WesternSign::Pisces->value => 'Ribe',

    ChineseSign::Rat->value => 'Pacov',
    ChineseSign::Ox->value => 'Bivol',
    ChineseSign::Tiger->value => 'Tigar',
    ChineseSign::Rabbit->value => 'Zec',
    ChineseSign::Dragon->value => 'Zmaj',
    ChineseSign::Snake->value => 'Zmija',
    ChineseSign::Horse->value => 'Konj',
    ChineseSign::Goat->value => 'Koza',
    ChineseSign::Monkey->value => 'Majmun',
    ChineseSign::Rooster->value => 'Pijetao',
    ChineseSign::Dog->value => 'Pas',
    ChineseSign::Pig->value => 'Svinja',
];
