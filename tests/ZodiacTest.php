<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Generator;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\Zodiac;
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

final class ZodiacTest extends TestCase
{
    public function testName(): void
    {
        $this->assertEquals('foo', $this->zodiac(name: 'foo')->name());
    }

    public function testHtml(): void
    {
        $this->assertEquals('foo', $this->zodiac(html: 'foo')->html());
    }

    public function testStartEnd(): void
    {
        $zodiac = $this->zodiac(startMonth: 6, startDay: 17, endMonth: 6, endDay: 30);
        $this->assertEquals(17, $zodiac->start()->day);
        $this->assertEquals(6, $zodiac->start()->month);
        $this->assertEquals(30, $zodiac->end()->day);
        $this->assertEquals(6, $zodiac->end()->month);
    }

    public function testCompatibility(): void
    {
        $this->assertGreaterThanOrEqual(0, (new Virgo())->compatibility(new Gemini()));
    }

    #[DataProvider('localizedDataProvider')]
    public function testLocalized(ZodiacInterface $zodiac, ?string $locale, string $localizedName): void
    {
        $this->assertEquals(
            $localizedName,
            $locale ? $zodiac->localized($locale)->name() : $zodiac->localized()->name(),
        );
    }

    public static function localizedDataProvider(): Generator
    {
        yield [new Aquarius(), null, 'Aquarius'];
        yield [new Aries(), null, 'Aries'];
        yield [new Cancer(), null, 'Cancer'];
        yield [new Capricorn(), null, 'Capricorn'];
        yield [new Gemini(), null, 'Gemini'];
        yield [new Leo(), null, 'Leo'];
        yield [new Libra(), null, 'Libra'];
        yield [new Pisces(), null, 'Pisces'];
        yield [new Sagittarius(), null, 'Sagittarius'];
        yield [new Scorpio(), null, 'Scorpio'];
        yield [new Taurus(), null, 'Taurus'];
        yield [new Virgo(), null, 'Virgo'];

        yield [new Aquarius(), 'en', 'Aquarius'];
        yield [new Aries(), 'en', 'Aries'];
        yield [new Cancer(), 'en', 'Cancer'];
        yield [new Capricorn(), 'en', 'Capricorn'];
        yield [new Gemini(), 'en', 'Gemini'];
        yield [new Leo(), 'en', 'Leo'];
        yield [new Libra(), 'en', 'Libra'];
        yield [new Pisces(), 'en', 'Pisces'];
        yield [new Sagittarius(), 'en', 'Sagittarius'];
        yield [new Scorpio(), 'en', 'Scorpio'];
        yield [new Taurus(), 'en', 'Taurus'];
        yield [new Virgo(), 'en', 'Virgo'];

        yield [new Aquarius(), 'de', 'Wassermann'];
        yield [new Aries(), 'de', 'Widder'];
        yield [new Cancer(), 'de', 'Krebs'];
        yield [new Capricorn(), 'de', 'Steinbock'];
        yield [new Gemini(), 'de', 'Zwillinge'];
        yield [new Leo(), 'de', 'Löwe'];
        yield [new Libra(), 'de', 'Waage'];
        yield [new Pisces(), 'de', 'Fische'];
        yield [new Sagittarius(), 'de', 'Schütze'];
        yield [new Scorpio(), 'de', 'Skorpion'];
        yield [new Taurus(), 'de', 'Stier'];
        yield [new Virgo(), 'de', 'Jungfrau'];
    }

    public function testToString(): void
    {
        $zodiac = $this->zodiac(name: 'test');
        $this->assertEquals('test', strval($zodiac));
        $this->assertEquals('test', (string) $zodiac);
    }

    private function zodiac(
        int $startMonth = 1,
        int $startDay = 1,
        int $endMonth = 2,
        int $endDay = 2,
        string $name = 'test',
        string $html = 'test',
    ): Zodiac {
        return new class (
            $startDay,
            $startMonth,
            $endDay,
            $endMonth,
            $name,
            $html,
        ) extends Zodiac {
            public function __construct(
                int $startDay,
                int $startMonth,
                int $endDay,
                int $endMonth,
                string $name,
                string $html
            ) {
                $this->startDay = $startDay;
                $this->startMonth = $startMonth;
                $this->endDay = $endDay;
                $this->endMonth = $endMonth;
                $this->name = $name;
                $this->html = $html;
            }
        };
    }
}
