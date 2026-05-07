<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeInterface;
use Generator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Sign;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\InvalidDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\WesternSign;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Stringable;

final class SignTest extends TestCase
{
    public function testName(): void
    {
        $this->assertEquals('Aries', WesternSign::Aries->localize('en')->name());
    }

    public function testHtml(): void
    {
        $this->assertEquals('♈', WesternSign::Aries->html());
    }

    public function testCompatibility(): void
    {
        $this->assertGreaterThanOrEqual(0, WesternSign::Virgo->compatibility(WesternSign::Gemini));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    public function testFromDate(DateTimeInterface $input, WesternSign|ChineseSign $expected, Astrology $astrology): void
    {
        $this->assertSame($expected, Sign::fromDate($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    public function testFromString(string|Stringable $input, WesternSign|ChineseSign $expected, Astrology $astrology): void
    {
        $this->assertSame($expected, Sign::fromString($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testFromUnix(int|string $input, WesternSign|ChineseSign $expected, Astrology $astrology): void
    {
        $this->assertSame($expected, Sign::fromUnix($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    public function testWesternSignFromString(
        string|Stringable $input,
        WesternSign $expected,
        Astrology $astrology,
    ): void {
        $this->assertSame($expected, WesternSign::fromString($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    public function testWesternSignFromUnix(
        string|float|int $input,
        WesternSign $expected,
        Astrology $astrology,
    ): void {
        $this->assertSame($expected, WesternSign::fromUnix($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    public function testWesternSignFromDate(
        DateTimeInterface $input,
        WesternSign $expected,
        Astrology $astrology,
    ): void {
        $this->assertSame($expected, WesternSign::fromDate($input, $astrology));
    }

    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    public function testChineseSignFromString(
        string|Stringable $input,
        ChineseSign $expected,
        Astrology $astrology,
    ): void {
        $this->assertSame($expected, ChineseSign::fromString($input, $astrology));
    }

    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testChineseSignFromUnix(
        string|float|int $input,
        ChineseSign $expected,
        Astrology $astrology,
    ): void {
        $this->assertSame($expected, ChineseSign::fromUnix($input, $astrology));
    }

    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    public function testChineseSignFromDate(
        DateTimeInterface $input,
        ChineseSign $expected,
        Astrology $astrology,
    ): void {
        $this->assertSame($expected, ChineseSign::fromDate($input, $astrology));
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
        yield [WesternSign::Aquarius, null, 'Aquarius'];
        yield [WesternSign::Aries, null, 'Aries'];
        yield [WesternSign::Cancer, null, 'Cancer'];
        yield [WesternSign::Capricorn, null, 'Capricorn'];
        yield [WesternSign::Gemini, null, 'Gemini'];
        yield [WesternSign::Leo, null, 'Leo'];
        yield [WesternSign::Libra, null, 'Libra'];
        yield [WesternSign::Pisces, null, 'Pisces'];
        yield [WesternSign::Sagittarius, null, 'Sagittarius'];
        yield [WesternSign::Scorpio, null, 'Scorpio'];
        yield [WesternSign::Taurus, null, 'Taurus'];
        yield [WesternSign::Virgo, null, 'Virgo'];

        yield [WesternSign::Aquarius, 'en', 'Aquarius'];
        yield [WesternSign::Aries, 'en', 'Aries'];
        yield [WesternSign::Cancer, 'en', 'Cancer'];
        yield [WesternSign::Capricorn, 'en', 'Capricorn'];
        yield [WesternSign::Gemini, 'en', 'Gemini'];
        yield [WesternSign::Leo, 'en', 'Leo'];
        yield [WesternSign::Libra, 'en', 'Libra'];
        yield [WesternSign::Pisces, 'en', 'Pisces'];
        yield [WesternSign::Sagittarius, 'en', 'Sagittarius'];
        yield [WesternSign::Scorpio, 'en', 'Scorpio'];
        yield [WesternSign::Taurus, 'en', 'Taurus'];
        yield [WesternSign::Virgo, 'en', 'Virgo'];

        yield [WesternSign::Aquarius, 'de', 'Wassermann'];
        yield [WesternSign::Aries, 'de', 'Widder'];
        yield [WesternSign::Cancer, 'de', 'Krebs'];
        yield [WesternSign::Capricorn, 'de', 'Steinbock'];
        yield [WesternSign::Gemini, 'de', 'Zwillinge'];
        yield [WesternSign::Leo, 'de', 'Löwe'];
        yield [WesternSign::Libra, 'de', 'Waage'];
        yield [WesternSign::Pisces, 'de', 'Fische'];
        yield [WesternSign::Sagittarius, 'de', 'Schütze'];
        yield [WesternSign::Scorpio, 'de', 'Skorpion'];
        yield [WesternSign::Taurus, 'de', 'Stier'];
        yield [WesternSign::Virgo, 'de', 'Jungfrau'];
    }

    public function testToString(): void
    {
        $this->assertEquals('Aries', WesternSign::Aries->value);
    }
}
