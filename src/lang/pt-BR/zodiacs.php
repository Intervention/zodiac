<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Áries',
    WesternSign::Taurus->value => 'Touro',
    WesternSign::Gemini->value => 'Gêmeos',
    WesternSign::Cancer->value => 'Câncer',
    WesternSign::Leo->value => 'Leão',
    WesternSign::Virgo->value => 'Virgem',
    WesternSign::Libra->value => 'Libra',
    WesternSign::Scorpio->value => 'Escorpião',
    WesternSign::Sagittarius->value => 'Sagitário',
    WesternSign::Capricorn->value => 'Capricórnio',
    WesternSign::Aquarius->value => 'Aquário',
    WesternSign::Pisces->value => 'Peixes',

    ChineseSign::Rat->value => 'Rato',
    ChineseSign::Ox->value => 'Boi',
    ChineseSign::Tiger->value => 'Tigre',
    ChineseSign::Rabbit->value => 'Coelho',
    ChineseSign::Dragon->value => 'Dragão',
    ChineseSign::Snake->value => 'Cobra',
    ChineseSign::Horse->value => 'Cavalo',
    ChineseSign::Goat->value => 'Cabra',
    ChineseSign::Monkey->value => 'Macaco',
    ChineseSign::Rooster->value => 'Galo',
    ChineseSign::Dog->value => 'Cão',
    ChineseSign::Pig->value => 'Porco',
];
