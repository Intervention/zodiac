<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeInterface;
use Generator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\Sign as ChineseSign;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Sign;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\InvalidDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\Sign as WesternSign;
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
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Stringable;

final class SignTest extends TestCase
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

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    public function testFromDate(DateTimeInterface $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Sign::fromDate($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    public function testFromString(string|Stringable $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Sign::fromString($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testFromUnix(int|string $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Sign::fromUnix($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    public function testWesternSignFromString(
        string|Stringable $input,
        string $resultClassname,
        Astrology $astrology,
    ): void {
        $this->assertInstanceOf($resultClassname, WesternSign::fromString($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    public function testWesternSignFromUnix(
        string|float|int $input,
        string $resultClassname,
        Astrology $astrology,
    ): void {
        $this->assertInstanceOf($resultClassname, WesternSign::fromUnix($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    public function testWesternSignFromDate(
        DateTimeInterface $input,
        string $resultClassname,
        Astrology $astrology,
    ): void {
        $this->assertInstanceOf($resultClassname, WesternSign::fromDate($input, $astrology));
    }

    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    public function testChineseSignFromString(
        string|Stringable $input,
        string $resultClassname,
        Astrology $astrology,
    ): void {
        $this->assertInstanceOf($resultClassname, ChineseSign::fromString($input, $astrology));
    }

    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testChineseSignFromUnix(
        string|float|int $input,
        string $resultClassname,
        Astrology $astrology,
    ): void {
        $this->assertInstanceOf($resultClassname, ChineseSign::fromUnix($input, $astrology));
    }

    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    public function testChineseSignFromDate(
        DateTimeInterface $input,
        string $resultClassname,
        Astrology $astrology,
    ): void {
        $this->assertInstanceOf($resultClassname, ChineseSign::fromDate($input, $astrology));
    }

    #[DataProviderExternal(InvalidDataProvider::class, 'invalidUnixDates')]
    public function testFromUnixInvalid(mixed $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        Sign::fromUnix($input);
    }

    #[DataProvider('localizedDataProvider')]
    public function testLocalized(SignInterface $sign, ?string $locale, string $localizedName): void
    {
        $this->assertEquals(
            $localizedName,
            $locale ? $sign->localize($locale)->name() : $sign->localize()->name(),
        );
    }

    #[DataProviderExternal(InvalidDataProvider::class, 'invalidStringDates')]
    public function testGetInvalidZodiacStrings(mixed $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        Sign::fromString($input);
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
    ): WesternSign {
        return new class (
            $startDay,
            $startMonth,
            $endDay,
            $endMonth,
            $name,
            $html,
        ) extends WesternSign {
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
