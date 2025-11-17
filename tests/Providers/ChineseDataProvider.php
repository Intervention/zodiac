<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use Carbon\Carbon;
use DateTime;
use Generator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\Compatibility;
use Intervention\Zodiac\Chinese\Signs\Dog;
use Intervention\Zodiac\Chinese\Signs\Dragon;
use Intervention\Zodiac\Chinese\Signs\Goat;
use Intervention\Zodiac\Chinese\Signs\Horse;
use Intervention\Zodiac\Chinese\Signs\Monkey;
use Intervention\Zodiac\Chinese\Signs\Ox;
use Intervention\Zodiac\Chinese\Signs\Pig;
use Intervention\Zodiac\Chinese\Signs\Rabbit;
use Intervention\Zodiac\Chinese\Signs\Rat;
use Intervention\Zodiac\Chinese\Signs\Rooster;
use Intervention\Zodiac\Chinese\Signs\Snake;
use Intervention\Zodiac\Chinese\Signs\Tiger;
use Stringable;

class ChineseDataProvider
{
    public static function stringDates(): Generator
    {
        yield ['1946-04-10', Dog::class, Astrology::CHINESE];
        yield ['2001-01-24', Snake::class, Astrology::CHINESE];
        yield ['2002-02-12', Horse::class, Astrology::CHINESE];
        yield ['2003-02-01', Goat::class, Astrology::CHINESE];
        yield ['2004-01-22', Monkey::class, Astrology::CHINESE];
        yield ['2005-02-09', Rooster::class, Astrology::CHINESE];
        yield ['2006-01-29', Dog::class, Astrology::CHINESE];
        yield ['2007-02-18', Pig::class, Astrology::CHINESE];
        yield ['2008-02-07', Rat::class, Astrology::CHINESE];
        yield ['2009-01-26', Ox::class, Astrology::CHINESE];
        yield ['2010-02-14', Tiger::class, Astrology::CHINESE];
        yield ['2011-02-03', Rabbit::class, Astrology::CHINESE];
        yield ['2012-01-23', Dragon::class, Astrology::CHINESE];
    }

    public static function stringableDates(): Generator
    {
        yield [static::stringableDateObject('1946-04-10'), Dog::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2001-01-24'), Snake::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2002-02-12'), Horse::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2003-02-01'), Goat::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2004-01-22'), Monkey::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2005-02-09'), Rooster::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2006-01-29'), Dog::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2007-02-18'), Pig::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2008-02-07'), Rat::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2009-01-26'), Ox::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2010-02-14'), Tiger::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2011-02-03'), Rabbit::class, Astrology::CHINESE];
        yield [static::stringableDateObject('2012-01-23'), Dragon::class, Astrology::CHINESE];
    }

    public static function dateTimeDates(): Generator
    {
        yield [new DateTime('1946-04-10'), Dog::class, Astrology::CHINESE];
        yield [new DateTime('2001-01-24'), Snake::class, Astrology::CHINESE];
        yield [new DateTime('2002-02-12'), Horse::class, Astrology::CHINESE];
        yield [new DateTime('2003-02-01'), Goat::class, Astrology::CHINESE];
        yield [new DateTime('2004-01-22'), Monkey::class, Astrology::CHINESE];
        yield [new DateTime('2005-02-09'), Rooster::class, Astrology::CHINESE];
        yield [new DateTime('2006-01-29'), Dog::class, Astrology::CHINESE];
        yield [new DateTime('2007-02-18'), Pig::class, Astrology::CHINESE];
        yield [new DateTime('2008-02-07'), Rat::class, Astrology::CHINESE];
        yield [new DateTime('2009-01-26'), Ox::class, Astrology::CHINESE];
        yield [new DateTime('2010-02-14'), Tiger::class, Astrology::CHINESE];
        yield [new DateTime('2011-02-03'), Rabbit::class, Astrology::CHINESE];
        yield [new DateTime('2012-01-23'), Dragon::class, Astrology::CHINESE];
    }

    public static function carbonDates(): Generator
    {
        yield [Carbon::parse('1946-04-10'), Dog::class, Astrology::CHINESE];
        yield [Carbon::parse('2001-01-24'), Snake::class, Astrology::CHINESE];
        yield [Carbon::parse('2002-02-12'), Horse::class, Astrology::CHINESE];
        yield [Carbon::parse('2003-02-01'), Goat::class, Astrology::CHINESE];
        yield [Carbon::parse('2004-01-22'), Monkey::class, Astrology::CHINESE];
        yield [Carbon::parse('2005-02-09'), Rooster::class, Astrology::CHINESE];
        yield [Carbon::parse('2006-01-29'), Dog::class, Astrology::CHINESE];
        yield [Carbon::parse('2007-02-18'), Pig::class, Astrology::CHINESE];
        yield [Carbon::parse('2008-02-07'), Rat::class, Astrology::CHINESE];
        yield [Carbon::parse('2009-01-26'), Ox::class, Astrology::CHINESE];
        yield [Carbon::parse('2010-02-14'), Tiger::class, Astrology::CHINESE];
        yield [Carbon::parse('2011-02-03'), Rabbit::class, Astrology::CHINESE];
        yield [Carbon::parse('2012-01-23'), Dragon::class, Astrology::CHINESE];
    }

    public static function unixTimestampDates(): Generator
    {
        yield [980294400, Snake::class, Astrology::CHINESE];
        yield [1013472000, Horse::class, Astrology::CHINESE];
        yield [1044057600, Goat::class, Astrology::CHINESE];
        yield [1074729600, Monkey::class, Astrology::CHINESE];
        yield [1107907200, Rooster::class, Astrology::CHINESE];
        yield [1138492800, Dog::class, Astrology::CHINESE];
        yield [1171756800, Pig::class, Astrology::CHINESE];
        yield [1202342400, Rat::class, Astrology::CHINESE];
        yield [1232928000, Ox::class, Astrology::CHINESE];
        yield [1266105600, Tiger::class, Astrology::CHINESE];
        yield [1296691200, Rabbit::class, Astrology::CHINESE];
        yield [1327276800, Dragon::class, Astrology::CHINESE];

        yield ['980294400', Snake::class, Astrology::CHINESE];
        yield ['1013472000', Horse::class, Astrology::CHINESE];
        yield ['1044057600', Goat::class, Astrology::CHINESE];
        yield ['1074729600', Monkey::class, Astrology::CHINESE];
        yield ['1107907200', Rooster::class, Astrology::CHINESE];
        yield ['1138492800', Dog::class, Astrology::CHINESE];
        yield ['1171756800', Pig::class, Astrology::CHINESE];
        yield ['1202342400', Rat::class, Astrology::CHINESE];
        yield ['1232928000', Ox::class, Astrology::CHINESE];
        yield ['1266105600', Tiger::class, Astrology::CHINESE];
        yield ['1296691200', Rabbit::class, Astrology::CHINESE];
        yield ['1327276800', Dragon::class, Astrology::CHINESE];
    }

    public static function compatibilityFactorDataProvider(): Generator
    {
        $signs = [
            Rat::class,
            Ox::class,
            Tiger::class,
            Rabbit::class,
            Dragon::class,
            Snake::class,
            Horse::class,
            Goat::class,
            Monkey::class,
            Rooster::class,
            Dog::class,
            Pig::class,
        ];

        foreach ($signs as $a) {
            foreach ($signs as $b) {
                yield [$a, $b, new Compatibility()];
            }
        }
    }

    private static function stringableDateObject(string $date): Stringable
    {
        return new class ($date) implements Stringable
        {
            public function __construct(protected string $date)
            {
                //
            }

            public function __toString(): string
            {
                return $this->date;
            }
        };
    }
}
