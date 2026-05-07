<?php

declare(strict_types=1);

use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Western\WesternSign;

return [
    WesternSign::Aries->value => 'Bạch Dương',
    WesternSign::Taurus->value => 'Kim Ngưu',
    WesternSign::Gemini->value => 'Song Tử',
    WesternSign::Cancer->value => 'Cự Giải',
    WesternSign::Leo->value => 'Sư Tử',
    WesternSign::Virgo->value => 'Xử Nữ',
    WesternSign::Libra->value => 'Thiên Bình',
    WesternSign::Scorpio->value => 'Thiên Yết',
    WesternSign::Sagittarius->value => 'Nhân Mã',
    WesternSign::Capricorn->value => 'Ma Kết',
    WesternSign::Aquarius->value => 'Bảo Bình',
    WesternSign::Pisces->value => 'Song Ngư',

    ChineseSign::Rat->value => 'Chuột',
    ChineseSign::Ox->value => 'Trâu',
    ChineseSign::Tiger->value => 'Hổ',
    ChineseSign::Rabbit->value => 'Thỏ',
    ChineseSign::Dragon->value => 'Rồng',
    ChineseSign::Snake->value => 'Rắn',
    ChineseSign::Horse->value => 'Ngựa',
    ChineseSign::Goat->value => 'Dê',
    ChineseSign::Monkey->value => 'Khỉ',
    ChineseSign::Rooster->value => 'Gà',
    ChineseSign::Dog->value => 'Chó',
    ChineseSign::Pig->value => 'Heo',
];
