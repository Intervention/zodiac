<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Widder',
    WesternSign::Taurus->value => 'Stier',
    WesternSign::Gemini->value => 'Zwillinge',
    WesternSign::Cancer->value => 'Krebs',
    WesternSign::Leo->value => 'Löwe',
    WesternSign::Virgo->value => 'Jungfrau',
    WesternSign::Libra->value => 'Waage',
    WesternSign::Scorpio->value => 'Skorpion',
    WesternSign::Sagittarius->value => 'Schütze',
    WesternSign::Capricorn->value => 'Steinbock',
    WesternSign::Aquarius->value => 'Wassermann',
    WesternSign::Pisces->value => 'Fische',

    ChineseSign::Rat->value => 'Ratte',
    ChineseSign::Ox->value => 'Büffel',
    ChineseSign::Tiger->value => 'Tiger',
    ChineseSign::Rabbit->value => 'Hase',
    ChineseSign::Dragon->value => 'Drache',
    ChineseSign::Snake->value => 'Schlange',
    ChineseSign::Horse->value => 'Pferd',
    ChineseSign::Goat->value => 'Schaf',
    ChineseSign::Monkey->value => 'Affe',
    ChineseSign::Rooster->value => 'Hahn',
    ChineseSign::Dog->value => 'Hund',
    ChineseSign::Pig->value => 'Schwein',
];
