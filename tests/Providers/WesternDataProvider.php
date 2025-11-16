<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use Carbon\Carbon;
use DateTime;
use Generator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Western\Compatibility;
use Intervention\Zodiac\Western\Signs\Aquarius;
use Intervention\Zodiac\Western\Signs\Aries;
use Intervention\Zodiac\Western\Signs\Cancer;
use Intervention\Zodiac\Western\Signs\Capricorn;
use Intervention\Zodiac\Western\Signs\Gemini;
use Intervention\Zodiac\Western\Signs\Leo;
use Intervention\Zodiac\Western\Signs\Libra;
use Intervention\Zodiac\Western\Signs\Pisces;
use Intervention\Zodiac\Western\Signs\Sagittarius;
use Intervention\Zodiac\Western\Signs\Scorpio;
use Intervention\Zodiac\Western\Signs\Taurus;
use Intervention\Zodiac\Western\Signs\Virgo;
use Stringable;

class WesternDataProvider
{
    public static function stringDates(): Generator
    {
        yield ['1977-03-27', Aries::class, Calendar::WESTERN];
        yield ['1977-04-27', Taurus::class, Calendar::WESTERN];
        yield ['1977-05-27', Gemini::class, Calendar::WESTERN];
        yield ['1977-06-27', Cancer::class, Calendar::WESTERN];
        yield ['1977-07-27', Leo::class, Calendar::WESTERN];
        yield ['1977-08-27', Virgo::class, Calendar::WESTERN];
        yield ['1977-09-27', Libra::class, Calendar::WESTERN];
        yield ['1977-10-27', Scorpio::class, Calendar::WESTERN];
        yield ['1977-11-27', Sagittarius::class, Calendar::WESTERN];
        yield ['1977-12-27', Capricorn::class, Calendar::WESTERN];
        yield ['1977-12-31 23:59:59', Capricorn::class, Calendar::WESTERN];
        yield ['1977-01-15', Capricorn::class, Calendar::WESTERN];
        yield ['1977-01-26', Aquarius::class, Calendar::WESTERN];
        yield ['1977-02-27', Pisces::class, Calendar::WESTERN];
        yield ['first day of june 1977', Gemini::class, Calendar::WESTERN];
        yield ['first day of june', Gemini::class, Calendar::WESTERN];
    }

    public static function stringableDates(): Generator
    {
        yield [self::stringableDateObject('1977-03-27'), Aries::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-04-27'), Taurus::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-05-27'), Gemini::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-06-27'), Cancer::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-07-27'), Leo::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-08-27'), Virgo::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-09-27'), Libra::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-10-27'), Scorpio::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-11-27'), Sagittarius::class, Calendar::WESTERN];
        yield [self::stringableDateObject('1977-12-27'), Capricorn::class, Calendar::WESTERN];
    }

    public static function unixTimestampDates(): Generator
    {
        yield ['228268800', Aries::class, Calendar::WESTERN];
        yield ['230947200', Taurus::class, Calendar::WESTERN];
        yield ['233539200', Gemini::class, Calendar::WESTERN];
        yield ['236217600', Cancer::class, Calendar::WESTERN];
        yield ['238809600', Leo::class, Calendar::WESTERN];
        yield ['235699200', Gemini::class, Calendar::WESTERN];
        yield ['241488000', Virgo::class, Calendar::WESTERN];
        yield ['244166400', Libra::class, Calendar::WESTERN];
        yield ['246758400', Scorpio::class, Calendar::WESTERN];
        yield ['249436800', Sagittarius::class, Calendar::WESTERN];
        yield ['252028800', Capricorn::class, Calendar::WESTERN];
        yield ['252374400', Capricorn::class, Calendar::WESTERN];
        yield ['220924800', Capricorn::class, Calendar::WESTERN];
        yield ['222134400', Capricorn::class, Calendar::WESTERN];
        yield ['223084800', Aquarius::class, Calendar::WESTERN];
        yield ['225849600', Pisces::class, Calendar::WESTERN];

        yield [228268800, Aries::class, Calendar::WESTERN];
        yield [230947200, Taurus::class, Calendar::WESTERN];
        yield [233539200, Gemini::class, Calendar::WESTERN];
        yield [236217600, Cancer::class, Calendar::WESTERN];
        yield [238809600, Leo::class, Calendar::WESTERN];
        yield [235699200, Gemini::class, Calendar::WESTERN];
        yield [241488000, Virgo::class, Calendar::WESTERN];
        yield [244166400, Libra::class, Calendar::WESTERN];
        yield [246758400, Scorpio::class, Calendar::WESTERN];
        yield [249436800, Sagittarius::class, Calendar::WESTERN];
        yield [252028800, Capricorn::class, Calendar::WESTERN];
        yield [252374400, Capricorn::class, Calendar::WESTERN];
        yield [220924800, Capricorn::class, Calendar::WESTERN];
        yield [222134400, Capricorn::class, Calendar::WESTERN];
        yield [223084800, Aquarius::class, Calendar::WESTERN];
        yield [225849600, Pisces::class, Calendar::WESTERN];
    }

    public static function dateTimeDates(): Generator
    {
        yield [new DateTime('1977-03-27'), Aries::class, Calendar::WESTERN];
        yield [new DateTime('1977-04-27'), Taurus::class, Calendar::WESTERN];
        yield [new DateTime('1977-05-27'), Gemini::class, Calendar::WESTERN];
        yield [new DateTime('1977-06-27'), Cancer::class, Calendar::WESTERN];
        yield [new DateTime('1977-07-27'), Leo::class, Calendar::WESTERN];
        yield [new DateTime('1977-06-21'), Gemini::class, Calendar::WESTERN];
        yield [new DateTime('1977-08-27'), Virgo::class, Calendar::WESTERN];
        yield [new DateTime('1977-09-27'), Libra::class, Calendar::WESTERN];
        yield [new DateTime('1977-10-27'), Scorpio::class, Calendar::WESTERN];
        yield [new DateTime('1977-11-27'), Sagittarius::class, Calendar::WESTERN];
        yield [new DateTime('1977-12-27'), Capricorn::class, Calendar::WESTERN];
        yield [new DateTime('1977-12-31'), Capricorn::class, Calendar::WESTERN];
        yield [new DateTime('1977-01-01'), Capricorn::class, Calendar::WESTERN];
        yield [new DateTime('1977-01-15'), Capricorn::class, Calendar::WESTERN];
        yield [new DateTime('1977-01-26'), Aquarius::class, Calendar::WESTERN];
        yield [new DateTime('1977-02-27'), Pisces::class, Calendar::WESTERN];
    }

    public static function carbonDates(): Generator
    {
        yield [Carbon::parse('1977-03-27'), Aries::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-04-27'), Taurus::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-05-27'), Gemini::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-06-27'), Cancer::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-07-27'), Leo::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-06-21'), Gemini::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-08-27'), Virgo::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-09-27'), Libra::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-10-27'), Scorpio::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-11-27'), Sagittarius::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-12-27'), Capricorn::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-12-31'), Capricorn::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-01-01'), Capricorn::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-01-15'), Capricorn::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-01-26'), Aquarius::class, Calendar::WESTERN];
        yield [Carbon::parse('1977-02-27'), Pisces::class, Calendar::WESTERN];
    }

    public static function compatibilityFactorDataProvider(): Generator
    {
        $zodiacs = [
            Aquarius::class,
            Aries::class,
            Cancer::class,
            Capricorn::class,
            Gemini::class,
            Leo::class,
            Libra::class,
            Pisces::class,
            Sagittarius::class,
            Scorpio::class,
            Taurus::class,
            Virgo::class,
        ];

        foreach ($zodiacs as $a) {
            foreach ($zodiacs as $b) {
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
