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
    WesternSign::Virgo->value => 'Devica',
    WesternSign::Libra->value => 'Vaga',
    WesternSign::Scorpio->value => 'Škorpija',
    WesternSign::Sagittarius->value => 'Strelac',
    WesternSign::Capricorn->value => 'Jarac',
    WesternSign::Aquarius->value => 'Vodolija',
    WesternSign::Pisces->value => 'Ribe',

    ChineseSign::Rat->value => 'Пацов',
    ChineseSign::Ox->value => 'Бик',
    ChineseSign::Tiger->value => 'Тигар',
    ChineseSign::Rabbit->value => 'Зец',
    ChineseSign::Dragon->value => 'Змај',
    ChineseSign::Snake->value => 'Змија',
    ChineseSign::Horse->value => 'Коњ',
    ChineseSign::Goat->value => 'Коза',
    ChineseSign::Monkey->value => 'Мајмун',
    ChineseSign::Rooster->value => 'Пиле',
    ChineseSign::Dog->value => 'Пас',
    ChineseSign::Pig->value => 'Свиња',
];
