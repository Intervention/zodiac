<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use DateTime;
use Generator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Western\Compatibility;
use Intervention\Zodiac\Western\WesternSign;
use Stringable;

class WesternDataProvider
{
    public static function stringDates(): Generator
    {
        yield ['1977-03-27', WesternSign::Aries, Astrology::WESTERN];
        yield ['1977-04-27', WesternSign::Taurus, Astrology::WESTERN];
        yield ['1977-05-27', WesternSign::Gemini, Astrology::WESTERN];
        yield ['1977-06-27', WesternSign::Cancer, Astrology::WESTERN];
        yield ['1977-07-27', WesternSign::Leo, Astrology::WESTERN];
        yield ['1977-08-27', WesternSign::Virgo, Astrology::WESTERN];
        yield ['1977-09-27', WesternSign::Libra, Astrology::WESTERN];
        yield ['1977-10-27', WesternSign::Scorpio, Astrology::WESTERN];
        yield ['1977-11-27', WesternSign::Sagittarius, Astrology::WESTERN];
        yield ['1977-12-27', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['1977-12-31 23:59:59', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['1977-01-15', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['1977-01-26', WesternSign::Aquarius, Astrology::WESTERN];
        yield ['1977-02-27', WesternSign::Pisces, Astrology::WESTERN];
        yield ['first day of june 1977', WesternSign::Gemini, Astrology::WESTERN];
        yield ['first day of june', WesternSign::Gemini, Astrology::WESTERN];
    }

    public static function stringableDates(): Generator
    {
        yield [self::stringableDateObject('1977-03-27'), WesternSign::Aries, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-04-27'), WesternSign::Taurus, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-05-27'), WesternSign::Gemini, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-06-27'), WesternSign::Cancer, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-07-27'), WesternSign::Leo, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-08-27'), WesternSign::Virgo, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-09-27'), WesternSign::Libra, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-10-27'), WesternSign::Scorpio, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-11-27'), WesternSign::Sagittarius, Astrology::WESTERN];
        yield [self::stringableDateObject('1977-12-27'), WesternSign::Capricorn, Astrology::WESTERN];
    }

    public static function unixTimestampDates(): Generator
    {
        yield ['228268800', WesternSign::Aries, Astrology::WESTERN];
        yield ['230947200', WesternSign::Taurus, Astrology::WESTERN];
        yield ['233539200', WesternSign::Gemini, Astrology::WESTERN];
        yield ['236217600', WesternSign::Cancer, Astrology::WESTERN];
        yield ['238809600', WesternSign::Leo, Astrology::WESTERN];
        yield ['235699200', WesternSign::Gemini, Astrology::WESTERN];
        yield ['241488000', WesternSign::Virgo, Astrology::WESTERN];
        yield ['244166400', WesternSign::Libra, Astrology::WESTERN];
        yield ['246758400', WesternSign::Scorpio, Astrology::WESTERN];
        yield ['249436800', WesternSign::Sagittarius, Astrology::WESTERN];
        yield ['252028800', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['252374400', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['220924800', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['222134400', WesternSign::Capricorn, Astrology::WESTERN];
        yield ['223084800', WesternSign::Aquarius, Astrology::WESTERN];
        yield ['225849600', WesternSign::Pisces, Astrology::WESTERN];

        yield [228268800, WesternSign::Aries, Astrology::WESTERN];
        yield [230947200, WesternSign::Taurus, Astrology::WESTERN];
        yield [233539200, WesternSign::Gemini, Astrology::WESTERN];
        yield [236217600, WesternSign::Cancer, Astrology::WESTERN];
        yield [238809600, WesternSign::Leo, Astrology::WESTERN];
        yield [235699200, WesternSign::Gemini, Astrology::WESTERN];
        yield [241488000, WesternSign::Virgo, Astrology::WESTERN];
        yield [244166400, WesternSign::Libra, Astrology::WESTERN];
        yield [246758400, WesternSign::Scorpio, Astrology::WESTERN];
        yield [249436800, WesternSign::Sagittarius, Astrology::WESTERN];
        yield [252028800, WesternSign::Capricorn, Astrology::WESTERN];
        yield [252374400, WesternSign::Capricorn, Astrology::WESTERN];
        yield [220924800, WesternSign::Capricorn, Astrology::WESTERN];
        yield [222134400, WesternSign::Capricorn, Astrology::WESTERN];
        yield [223084800, WesternSign::Aquarius, Astrology::WESTERN];
        yield [225849600, WesternSign::Pisces, Astrology::WESTERN];
    }

    public static function dateTimeDates(): Generator
    {
        yield [new DateTime('1977-03-27'), WesternSign::Aries, Astrology::WESTERN];
        yield [new DateTime('1977-04-27'), WesternSign::Taurus, Astrology::WESTERN];
        yield [new DateTime('1977-05-27'), WesternSign::Gemini, Astrology::WESTERN];
        yield [new DateTime('1977-06-27'), WesternSign::Cancer, Astrology::WESTERN];
        yield [new DateTime('1977-07-27'), WesternSign::Leo, Astrology::WESTERN];
        yield [new DateTime('1977-06-21'), WesternSign::Gemini, Astrology::WESTERN];
        yield [new DateTime('1977-08-27'), WesternSign::Virgo, Astrology::WESTERN];
        yield [new DateTime('1977-09-27'), WesternSign::Libra, Astrology::WESTERN];
        yield [new DateTime('1977-10-27'), WesternSign::Scorpio, Astrology::WESTERN];
        yield [new DateTime('1977-11-27'), WesternSign::Sagittarius, Astrology::WESTERN];
        yield [new DateTime('1977-12-27'), WesternSign::Capricorn, Astrology::WESTERN];
        yield [new DateTime('1977-12-31'), WesternSign::Capricorn, Astrology::WESTERN];
        yield [new DateTime('1977-01-01'), WesternSign::Capricorn, Astrology::WESTERN];
        yield [new DateTime('1977-01-15'), WesternSign::Capricorn, Astrology::WESTERN];
        yield [new DateTime('1977-01-26'), WesternSign::Aquarius, Astrology::WESTERN];
        yield [new DateTime('1977-02-27'), WesternSign::Pisces, Astrology::WESTERN];
    }

    public static function compatibilityFactorDataProvider(): Generator
    {
        foreach (WesternSign::cases() as $a) {
            foreach (WesternSign::cases() as $b) {
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
