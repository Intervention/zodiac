<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use Generator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Zodiacs\Chinese\Dog;
use Intervention\Zodiac\Zodiacs\Chinese\Dragon;
use Intervention\Zodiac\Zodiacs\Chinese\Goat;
use Intervention\Zodiac\Zodiacs\Chinese\Horse;
use Intervention\Zodiac\Zodiacs\Chinese\Monkey;
use Intervention\Zodiac\Zodiacs\Chinese\Ox;
use Intervention\Zodiac\Zodiacs\Chinese\Pig;
use Intervention\Zodiac\Zodiacs\Chinese\Rabbit;
use Intervention\Zodiac\Zodiacs\Chinese\Rat;
use Intervention\Zodiac\Zodiacs\Chinese\Rooster;
use Intervention\Zodiac\Zodiacs\Chinese\Snake;
use Intervention\Zodiac\Zodiacs\Chinese\Tiger;

class ChineseDataProvider
{
    public static function stringDates(): Generator
    {
        yield ['2001-01-24', Snake::class, Calendar::CHINESE];
        yield ['2002-02-12', Horse::class, Calendar::CHINESE];
        yield ['2003-02-01', Goat::class, Calendar::CHINESE];
        yield ['2004-01-22', Monkey::class, Calendar::CHINESE];
        yield ['2005-02-09', Rooster::class, Calendar::CHINESE];
        yield ['2006-01-29', Dog::class, Calendar::CHINESE];
        yield ['2007-02-18', Pig::class, Calendar::CHINESE];
        yield ['2008-02-07', Rat::class, Calendar::CHINESE];
        yield ['2009-01-26', Ox::class, Calendar::CHINESE];
        yield ['2010-02-14', Tiger::class, Calendar::CHINESE];
        yield ['2011-02-03', Rabbit::class, Calendar::CHINESE];
        yield ['2012-01-23', Dragon::class, Calendar::CHINESE];
    }
}
