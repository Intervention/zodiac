<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use DateTime;
use Generator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\Compatibility;
use Intervention\Zodiac\Chinese\ChineseSign;
use Stringable;

class ChineseDataProvider
{
    public static function stringDates(): Generator
    {
        yield ['1946-04-10', ChineseSign::Dog, Astrology::CHINESE];
        yield ['2001-01-24', ChineseSign::Snake, Astrology::CHINESE];
        yield ['2002-02-12', ChineseSign::Horse, Astrology::CHINESE];
        yield ['2003-02-01', ChineseSign::Goat, Astrology::CHINESE];
        yield ['2004-01-22', ChineseSign::Monkey, Astrology::CHINESE];
        yield ['2005-02-09', ChineseSign::Rooster, Astrology::CHINESE];
        yield ['2006-01-29', ChineseSign::Dog, Astrology::CHINESE];
        yield ['2007-02-18', ChineseSign::Pig, Astrology::CHINESE];
        yield ['2008-02-07', ChineseSign::Rat, Astrology::CHINESE];
        yield ['2009-01-26', ChineseSign::Ox, Astrology::CHINESE];
        yield ['2010-02-14', ChineseSign::Tiger, Astrology::CHINESE];
        yield ['2011-02-03', ChineseSign::Rabbit, Astrology::CHINESE];
        yield ['2012-01-23', ChineseSign::Dragon, Astrology::CHINESE];
    }

    public static function stringableDates(): Generator
    {
        yield [static::stringableDateObject('1946-04-10'), ChineseSign::Dog, Astrology::CHINESE];
        yield [static::stringableDateObject('2001-01-24'), ChineseSign::Snake, Astrology::CHINESE];
        yield [static::stringableDateObject('2002-02-12'), ChineseSign::Horse, Astrology::CHINESE];
        yield [static::stringableDateObject('2003-02-01'), ChineseSign::Goat, Astrology::CHINESE];
        yield [static::stringableDateObject('2004-01-22'), ChineseSign::Monkey, Astrology::CHINESE];
        yield [static::stringableDateObject('2005-02-09'), ChineseSign::Rooster, Astrology::CHINESE];
        yield [static::stringableDateObject('2006-01-29'), ChineseSign::Dog, Astrology::CHINESE];
        yield [static::stringableDateObject('2007-02-18'), ChineseSign::Pig, Astrology::CHINESE];
        yield [static::stringableDateObject('2008-02-07'), ChineseSign::Rat, Astrology::CHINESE];
        yield [static::stringableDateObject('2009-01-26'), ChineseSign::Ox, Astrology::CHINESE];
        yield [static::stringableDateObject('2010-02-14'), ChineseSign::Tiger, Astrology::CHINESE];
        yield [static::stringableDateObject('2011-02-03'), ChineseSign::Rabbit, Astrology::CHINESE];
        yield [static::stringableDateObject('2012-01-23'), ChineseSign::Dragon, Astrology::CHINESE];
    }

    public static function dateTimeDates(): Generator
    {
        yield [new DateTime('1946-04-10'), ChineseSign::Dog, Astrology::CHINESE];
        yield [new DateTime('2001-01-24'), ChineseSign::Snake, Astrology::CHINESE];
        yield [new DateTime('2002-02-12'), ChineseSign::Horse, Astrology::CHINESE];
        yield [new DateTime('2003-02-01'), ChineseSign::Goat, Astrology::CHINESE];
        yield [new DateTime('2004-01-22'), ChineseSign::Monkey, Astrology::CHINESE];
        yield [new DateTime('2005-02-09'), ChineseSign::Rooster, Astrology::CHINESE];
        yield [new DateTime('2006-01-29'), ChineseSign::Dog, Astrology::CHINESE];
        yield [new DateTime('2007-02-18'), ChineseSign::Pig, Astrology::CHINESE];
        yield [new DateTime('2008-02-07'), ChineseSign::Rat, Astrology::CHINESE];
        yield [new DateTime('2009-01-26'), ChineseSign::Ox, Astrology::CHINESE];
        yield [new DateTime('2010-02-14'), ChineseSign::Tiger, Astrology::CHINESE];
        yield [new DateTime('2011-02-03'), ChineseSign::Rabbit, Astrology::CHINESE];
        yield [new DateTime('2012-01-23'), ChineseSign::Dragon, Astrology::CHINESE];
    }

    public static function unixTimestampDates(): Generator
    {
        yield [980294400, ChineseSign::Snake, Astrology::CHINESE];
        yield [1013472000, ChineseSign::Horse, Astrology::CHINESE];
        yield [1044057600, ChineseSign::Goat, Astrology::CHINESE];
        yield [1074729600, ChineseSign::Monkey, Astrology::CHINESE];
        yield [1107907200, ChineseSign::Rooster, Astrology::CHINESE];
        yield [1138492800, ChineseSign::Dog, Astrology::CHINESE];
        yield [1171756800, ChineseSign::Pig, Astrology::CHINESE];
        yield [1202342400, ChineseSign::Rat, Astrology::CHINESE];
        yield [1232928000, ChineseSign::Ox, Astrology::CHINESE];
        yield [1266105600, ChineseSign::Tiger, Astrology::CHINESE];
        yield [1296691200, ChineseSign::Rabbit, Astrology::CHINESE];
        yield [1327276800, ChineseSign::Dragon, Astrology::CHINESE];

        yield ['980294400', ChineseSign::Snake, Astrology::CHINESE];
        yield ['1013472000', ChineseSign::Horse, Astrology::CHINESE];
        yield ['1044057600', ChineseSign::Goat, Astrology::CHINESE];
        yield ['1074729600', ChineseSign::Monkey, Astrology::CHINESE];
        yield ['1107907200', ChineseSign::Rooster, Astrology::CHINESE];
        yield ['1138492800', ChineseSign::Dog, Astrology::CHINESE];
        yield ['1171756800', ChineseSign::Pig, Astrology::CHINESE];
        yield ['1202342400', ChineseSign::Rat, Astrology::CHINESE];
        yield ['1232928000', ChineseSign::Ox, Astrology::CHINESE];
        yield ['1266105600', ChineseSign::Tiger, Astrology::CHINESE];
        yield ['1296691200', ChineseSign::Rabbit, Astrology::CHINESE];
        yield ['1327276800', ChineseSign::Dragon, Astrology::CHINESE];
    }

    public static function compatibilityFactorDataProvider(): Generator
    {
        foreach (ChineseSign::cases() as $a) {
            foreach (ChineseSign::cases() as $b) {
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
