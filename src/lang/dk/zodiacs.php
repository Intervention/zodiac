<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Vædderen',
    WesternSign::Taurus->value => 'Tyren',
    WesternSign::Gemini->value => 'Tvillingerne',
    WesternSign::Cancer->value => 'Krebsen',
    WesternSign::Leo->value => 'Løven',
    WesternSign::Virgo->value => 'Jomfruen',
    WesternSign::Libra->value => 'Vægten',
    WesternSign::Scorpio->value => 'Skorpionen',
    WesternSign::Sagittarius->value => 'Skytten',
    WesternSign::Capricorn->value => 'Stenbukken',
    WesternSign::Aquarius->value => 'Vandmanden',
    WesternSign::Pisces->value => 'Fiskene',

    ChineseSign::Rat->value => 'Rotte',
    ChineseSign::Ox->value => 'Okse',
    ChineseSign::Tiger->value => 'Tiger',
    ChineseSign::Rabbit->value => 'Kanin',
    ChineseSign::Dragon->value => 'Drage',
    ChineseSign::Snake->value => 'Slange',
    ChineseSign::Horse->value => 'Hest',
    ChineseSign::Goat->value => 'Ged',
    ChineseSign::Monkey->value => 'Abe',
    ChineseSign::Rooster->value => 'Hane',
    ChineseSign::Dog->value => 'Hund',
    ChineseSign::Pig->value => 'Gris',
];
