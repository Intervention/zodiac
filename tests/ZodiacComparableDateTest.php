<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeInterface;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
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
use PHPUnit\Framework\Attributes\DataProviderExternal;
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

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    public function testZodiacComparableDate(DateTimeInterface $date, string $matchingZodiac): void
    {
        $comparable = new ZodiacComparableDate($date);

        foreach (
            array_filter($this::ZODIAC_CLASSNAMES, fn(string $name): bool => $name === $matchingZodiac) as $classname
        ) {
            $this->assertTrue($comparable->isZodiac(new $classname()));
        }

        foreach (
            array_filter($this::ZODIAC_CLASSNAMES, fn(string $name): bool => $name !== $matchingZodiac) as $classname
        ) {
            $this->assertFalse($comparable->isZodiac(new $classname()));
        }
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    public function testYear(DateTimeInterface $date): void
    {
        $this->assertEquals(1977, (new ZodiacComparableDate($date))->year());
    }
}
