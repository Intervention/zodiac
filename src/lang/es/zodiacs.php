<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Aries',
    WesternSign::Taurus->value => 'Tauro',
    WesternSign::Gemini->value => 'Géminis',
    WesternSign::Cancer->value => 'Cáncer',
    WesternSign::Leo->value => 'Leo',
    WesternSign::Virgo->value => 'Virgo',
    WesternSign::Libra->value => 'Libra',
    WesternSign::Scorpio->value => 'Escorpio',
    WesternSign::Sagittarius->value => 'Sagitario',
    WesternSign::Capricorn->value => 'Capricornio',
    WesternSign::Aquarius->value => 'Acuario',
    WesternSign::Pisces->value => 'Piscis',

    ChineseSign::Rat->value => 'Rata',
    ChineseSign::Ox->value => 'Buey',
    ChineseSign::Tiger->value => 'Tigre',
    ChineseSign::Rabbit->value => 'Conejo',
    ChineseSign::Dragon->value => 'Dragón',
    ChineseSign::Snake->value => 'Serpiente',
    ChineseSign::Horse->value => 'Caballo',
    ChineseSign::Goat->value => 'Cabra',
    ChineseSign::Monkey->value => 'Mono',
    ChineseSign::Rooster->value => 'Gallo',
    ChineseSign::Dog->value => 'Perro',
    ChineseSign::Pig->value => 'Cerdito',
];
