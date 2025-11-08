<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\Carbon;
use Generator;
use Intervention\Zodiac\ZodiacComparableDate;
use Intervention\Zodiac\Zodiacs\Western\Aquarius;
use Intervention\Zodiac\Zodiacs\Western\Aries;
use Intervention\Zodiac\Zodiacs\Western\Cancer;
use Intervention\Zodiac\Zodiacs\Western\Capricorn;
use Intervention\Zodiac\Zodiacs\Western\Gemini;
use Intervention\Zodiac\Zodiacs\Western\Leo;
use Intervention\Zodiac\Zodiacs\Western\Libra;
use Intervention\Zodiac\Zodiacs\Western\Pisces;
use Intervention\Zodiac\Zodiacs\Western\Sagittarius;
use Intervention\Zodiac\Zodiacs\Western\Scorpio;
use Intervention\Zodiac\Zodiacs\Western\Taurus;
use Intervention\Zodiac\Zodiacs\Western\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ZodiacComparableDateTest extends TestCase
{
    protected const ZODIAC_CLASSNAMES = [
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

    #[DataProvider('zodiacComparableDateProvider')]
    public function testZodiacComparableDate(Carbon $date, string $matchingZodiac): void
    {
        $comparable = new ZodiacComparableDate($date);

        foreach (
            array_filter($this::ZODIAC_CLASSNAMES, fn(string $name): bool => $name === $matchingZodiac,) as $classname
        ) {
            $this->assertTrue($comparable->isZodiac(new $classname()));
        }

        foreach (
            array_filter($this::ZODIAC_CLASSNAMES, fn(string $name): bool => $name !== $matchingZodiac,) as $classname
        ) {
            $this->assertFalse($comparable->isZodiac(new $classname()));
        }
    }

    public static function zodiacComparableDateProvider(): Generator
    {
        yield [Carbon::parse('1977-03-27'), Aries::class];
        yield [Carbon::parse('1977-04-27'), Taurus::class];
        yield [Carbon::parse('1977-05-27'), Gemini::class];
        yield [Carbon::parse('1977-06-27'), Cancer::class];
        yield [Carbon::parse('1977-07-27'), Leo::class];
        yield [Carbon::parse('1977-06-21'), Gemini::class];
        yield [Carbon::parse('1977-08-27'), Virgo::class];
        yield [Carbon::parse('1977-09-27'), Libra::class];
        yield [Carbon::parse('1977-10-27'), Scorpio::class];
        yield [Carbon::parse('1977-11-27'), Sagittarius::class];
        yield [Carbon::parse('1977-12-27'), Capricorn::class];
        yield [Carbon::parse('1977-12-31'), Capricorn::class];
        yield [Carbon::parse('1977-01-01'), Capricorn::class];
        yield [Carbon::parse('1977-01-15'), Capricorn::class];
        yield [Carbon::parse('1977-01-26'), Aquarius::class];
        yield [Carbon::parse('1977-02-27'), Pisces::class];
    }
}
