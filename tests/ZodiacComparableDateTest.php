<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeInterface;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\ZodiacComparableDate;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class ZodiacComparableDateTest extends TestCase
{
    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    public function testZodiacComparableDate(DateTimeInterface $date, string $matchingZodiac, Calendar $calendar): void
    {
        $comparable = new ZodiacComparableDate($date);

        foreach (
            array_filter($calendar->signClassnames(), fn(string $name): bool => $name === $matchingZodiac) as $classname
        ) {
            $this->assertTrue($comparable->isZodiac(new $classname()));
        }

        foreach (
            array_filter($calendar->signClassnames(), fn(string $name): bool => $name !== $matchingZodiac) as $classname
        ) {
            $this->assertFalse($comparable->isZodiac(new $classname()));
        }
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    public function testYear(DateTimeInterface $date, string $matchingZodiac, Calendar $calendar): void
    {
        $this->assertEquals((int) $date->format('Y'), (new ZodiacComparableDate($date))->year());
    }
}
