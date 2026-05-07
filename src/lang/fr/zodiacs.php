<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Bélier',
    WesternSign::Taurus->value => 'Taureau',
    WesternSign::Gemini->value => 'Gémeaux',
    WesternSign::Cancer->value => 'Cancer',
    WesternSign::Leo->value => 'Lion',
    WesternSign::Virgo->value => 'Vierge',
    WesternSign::Libra->value => 'Balance',
    WesternSign::Scorpio->value => 'Scorpion',
    WesternSign::Sagittarius->value => 'Sagittaire',
    WesternSign::Capricorn->value => 'Capricorne',
    WesternSign::Aquarius->value => 'Verseau',
    WesternSign::Pisces->value => 'Poissons',

    ChineseSign::Rat->value => 'Rat',
    ChineseSign::Ox->value => 'Bœuf',
    ChineseSign::Tiger->value => 'Tigre',
    ChineseSign::Rabbit->value => 'Lapin',
    ChineseSign::Dragon->value => 'Dragon',
    ChineseSign::Snake->value => 'Serpent',
    ChineseSign::Horse->value => 'Cheval',
    ChineseSign::Goat->value => 'Chèvre',
    ChineseSign::Monkey->value => 'Singe',
    ChineseSign::Rooster->value => 'Coq',
    ChineseSign::Dog->value => 'Chien',
    ChineseSign::Pig->value => 'Cochon',
];
