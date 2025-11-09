<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\Carbon;
use Generator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Interfaces\SignInterface;
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
use Intervention\Zodiac\Signs\Western\Aquarius;
use Intervention\Zodiac\Signs\Western\Aries;
use Intervention\Zodiac\Signs\Western\Cancer;
use Intervention\Zodiac\Signs\Western\Capricorn;
use Intervention\Zodiac\Signs\Western\Gemini;
use Intervention\Zodiac\Signs\Western\Leo;
use Intervention\Zodiac\Signs\Western\Libra;
use Intervention\Zodiac\Signs\Western\Pisces;
use Intervention\Zodiac\Signs\Western\Sagittarius;
use Intervention\Zodiac\Signs\Western\Scorpio;
use Intervention\Zodiac\Signs\Western\Taurus;
use Intervention\Zodiac\Signs\Western\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    /**
     * @param array<string> $classes
     */
    #[DataProvider('zodiacClassnameProvider')]
    public function testZodiacClassnames(Calendar $calendar, array $classes): void
    {
        $this->assertEquals($classes, $calendar->signClassnames());
    }

    public static function zodiacClassnameProvider(): Generator
    {
        yield [
            Calendar::WESTERN,
            [
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
            ]
        ];

        yield [
            Calendar::CHINESE,
            [
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
            ]
        ];
    }

    /**
     * @param array<SignInterface> $range
     */
    #[DataProvider('westernRangeDataProvider')]
    #[DataProvider('chineseRangeDataProvider')]
    public function testRange(Calendar $calendar, int $year, array $range): void
    {
        $this->assertEquals($calendar->range($year), $range);
    }

    public static function westernRangeDataProvider(): Generator
    {
        $instances = array_map(
            fn(string $classname): SignInterface => new $classname(),
            (Calendar::WESTERN)->signClassnames(),
        );

        yield [Calendar::WESTERN, 2000, $instances];
        yield [Calendar::WESTERN, 2001, $instances];
        yield [Calendar::WESTERN, 2002, $instances];
    }

    public static function chineseRangeDataProvider(): Generator
    {
        yield [
            Calendar::CHINESE,
            2000,
            [
                new Rabbit(from: Carbon::create(1999, 2, 16), to: Carbon::create(2000, 2, 5)),
                new Dragon(from: Carbon::create(2000, 2, 5)),
            ]
        ];

        yield [
            Calendar::CHINESE,
            2001,
            [
                new Dragon(from: Carbon::create(2000, 2, 5), to: Carbon::create(2001, 1, 24)),
                new Snake(from: Carbon::create(2001, 1, 24)),
            ]
        ];

        yield [
            Calendar::CHINESE,
            2002,
            [
                new Snake(from: Carbon::create(2001, 1, 24), to: Carbon::create(2002, 2, 12)),
                new Horse(from: Carbon::create(2002, 2, 12)),
            ]
        ];
    }
}
