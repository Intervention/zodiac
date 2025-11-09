<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\Carbon;
use Generator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
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
     * @param array<ZodiacInterface> $range
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
            fn(string $classname): ZodiacInterface => new $classname(),
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
