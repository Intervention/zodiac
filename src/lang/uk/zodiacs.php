<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Овен',
    WesternSign::Taurus->value => 'Телець',
    WesternSign::Gemini->value => 'Близнюки',
    WesternSign::Cancer->value => 'Рак',
    WesternSign::Leo->value => 'Лев',
    WesternSign::Virgo->value => 'Діва',
    WesternSign::Libra->value => 'Терези',
    WesternSign::Scorpio->value => 'Скорпіон',
    WesternSign::Sagittarius->value => 'Стрілець',
    WesternSign::Capricorn->value => 'Козоріг',
    WesternSign::Aquarius->value => 'Водолій',
    WesternSign::Pisces->value => 'Риби',

    ChineseSign::Rat->value => 'Щур',
    ChineseSign::Ox->value => 'Бик',
    ChineseSign::Tiger->value => 'Тигр',
    ChineseSign::Rabbit->value => 'Кролик',
    ChineseSign::Dragon->value => 'Дракон',
    ChineseSign::Snake->value => 'Змія',
    ChineseSign::Horse->value => 'Кінь',
    ChineseSign::Goat->value => 'Коза',
    ChineseSign::Monkey->value => 'Мавпа',
    ChineseSign::Rooster->value => 'Півень',
    ChineseSign::Dog->value => 'Собака',
    ChineseSign::Pig->value => 'Свиня',
];
