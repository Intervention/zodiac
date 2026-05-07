<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Овен',
    WesternSign::Taurus->value => 'Телец',
    WesternSign::Gemini->value => 'Близнаци',
    WesternSign::Cancer->value => 'Рак',
    WesternSign::Leo->value => 'Лъв',
    WesternSign::Virgo->value => 'Дева',
    WesternSign::Libra->value => 'Везни',
    WesternSign::Scorpio->value => 'Скорпион',
    WesternSign::Sagittarius->value => 'Стрелец',
    WesternSign::Capricorn->value => 'Козирог',
    WesternSign::Aquarius->value => 'Водолей',
    WesternSign::Pisces->value => 'Риби',

    ChineseSign::Rat->value => 'Плъх',
    ChineseSign::Ox->value => 'Вол',
    ChineseSign::Tiger->value => 'Тигър',
    ChineseSign::Rabbit->value => 'Заек',
    ChineseSign::Dragon->value => 'Дракон',
    ChineseSign::Snake->value => 'Змия',
    ChineseSign::Horse->value => 'Кон',
    ChineseSign::Goat->value => 'Коза',
    ChineseSign::Monkey->value => 'Маймуна',
    ChineseSign::Rooster->value => 'Петел',
    ChineseSign::Dog->value => 'Куче',
    ChineseSign::Pig->value => 'Свинско',
];
