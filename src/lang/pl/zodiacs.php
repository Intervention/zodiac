<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Baran',
    WesternSign::Taurus->value => 'Byk',
    WesternSign::Gemini->value => 'Bliźnięta',
    WesternSign::Cancer->value => 'Rak',
    WesternSign::Leo->value => 'Lew',
    WesternSign::Virgo->value => 'Panna',
    WesternSign::Libra->value => 'Waga',
    WesternSign::Scorpio->value => 'Skorpion',
    WesternSign::Sagittarius->value => 'Strzelec',
    WesternSign::Capricorn->value => 'Koziorożec',
    WesternSign::Aquarius->value => 'Wodnik',
    WesternSign::Pisces->value => 'Ryby',

    ChineseSign::Rat->value => 'Szczur',
    ChineseSign::Ox->value => 'Wół',
    ChineseSign::Tiger->value => 'Tygrys',
    ChineseSign::Rabbit->value => 'Królik',
    ChineseSign::Dragon->value => 'Smok',
    ChineseSign::Snake->value => 'Wąż',
    ChineseSign::Horse->value => 'Koń',
    ChineseSign::Goat->value => 'Koza',
    ChineseSign::Monkey->value => 'Małpa',
    ChineseSign::Rooster->value => 'Kogut',
    ChineseSign::Dog->value => 'Pies',
    ChineseSign::Pig->value => 'Świnia',
];
