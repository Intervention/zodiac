<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Generator;
use Intervention\Zodiac\Interfaces\SignInterface;
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
use Intervention\Zodiac\Western\Signs\Sign;
use Intervention\Zodiac\Western\Signs\Taurus;
use Intervention\Zodiac\Western\Signs\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ZodiacTest extends TestCase
{
    public function testName(): void
    {
        $this->assertEquals('foo', $this->zodiacSign(name: 'foo')->name());
    }

    public function testHtml(): void
    {
        $this->assertEquals('foo', $this->zodiacSign(html: 'foo')->html());
    }

    public function testCompatibility(): void
    {
        $this->assertGreaterThanOrEqual(0, (new Virgo())->compatibility(new Gemini()));
    }

    #[DataProvider('localizedDataProvider')]
    public function testLocalized(SignInterface $sign, ?string $locale, string $localizedName): void
    {
        $this->assertEquals(
            $localizedName,
            $locale ? $sign->localize($locale)->name() : $sign->localize()->name(),
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
        $sign = $this->zodiacSign(name: 'test');
        $this->assertEquals('test', strval($sign));
        $this->assertEquals('test', (string) $sign);
    }

    private function zodiacSign(
        int $startMonth = 1,
        int $startDay = 1,
        int $endMonth = 2,
        int $endDay = 2,
        string $name = 'test',
        string $html = 'test',
    ): Sign {
        return new class (
            $startDay,
            $startMonth,
            $endDay,
            $endMonth,
            $name,
            $html,
        ) extends Sign {
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
