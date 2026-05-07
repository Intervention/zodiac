<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => '牡羊座',
    WesternSign::Taurus->value => '牡牛座',
    WesternSign::Gemini->value => '双子座',
    WesternSign::Cancer->value => '蟹座',
    WesternSign::Leo->value => '獅子座',
    WesternSign::Virgo->value => '乙女座',
    WesternSign::Libra->value => '天秤座',
    WesternSign::Scorpio->value => '蠍座',
    WesternSign::Sagittarius->value => '射手座',
    WesternSign::Capricorn->value => '山羊座',
    WesternSign::Aquarius->value => '水瓶座',
    WesternSign::Pisces->value => '魚座',

    ChineseSign::Rat->value => '子',
    ChineseSign::Ox->value => '丑',
    ChineseSign::Tiger->value => '寅',
    ChineseSign::Rabbit->value => '卯',
    ChineseSign::Dragon->value => '辰',
    ChineseSign::Snake->value => '巳',
    ChineseSign::Horse->value => '午',
    ChineseSign::Goat->value => '未',
    ChineseSign::Monkey->value => '申',
    ChineseSign::Rooster->value => '酉',
    ChineseSign::Dog->value => '戌',
    ChineseSign::Pig->value => '亥',
];
