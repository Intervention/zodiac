<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use Generator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Signs\Chinese\Dog;
use Intervention\Zodiac\Signs\Chinese\Dragon;
use Intervention\Zodiac\Signs\Chinese\Goat;
use Intervention\Zodiac\Signs\Chinese\Horse;
use Intervention\Zodiac\Signs\Chinese\Monkey;
use Intervention\Zodiac\Signs\Chinese\Ox;
use Intervention\Zodiac\Signs\Chinese\Pig;
use Intervention\Zodiac\Signs\Chinese\Rabbit;
use Intervention\Zodiac\Signs\Chinese\Rat;
use Intervention\Zodiac\Signs\Chinese\Rooster;
use Intervention\Zodiac\Signs\Chinese\Snake;
use Intervention\Zodiac\Signs\Chinese\Tiger;

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
