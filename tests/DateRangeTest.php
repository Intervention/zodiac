<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTime;
use DateTimeImmutable;
use Intervention\Zodiac\DateRange;
use PHPUnit\Framework\TestCase;

final class DateRangeTest extends TestCase
{
    public function testContainsStartDate(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-01-01')));
    }

    public function testContainsEndDate(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-01-31')));
    }

    public function testContainsDateInMiddle(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-01-15')));
    }

    public function testDoesNotContainDateBefore(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
        );

        $this->assertFalse($range->contains(new DateTimeImmutable('2023-12-31')));
    }

    public function testDoesNotContainDateAfter(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
        );

        $this->assertFalse($range->contains(new DateTimeImmutable('2024-02-01')));
    }

    public function testContainsSingleDayRange(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-06-15'),
            new DateTimeImmutable('2024-06-15'),
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-06-15')));
        $this->assertFalse($range->contains(new DateTimeImmutable('2024-06-14')));
        $this->assertFalse($range->contains(new DateTimeImmutable('2024-06-16')));
    }

    public function testExcludeEndContainsStart(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
            excludeEnd: true,
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-01-01')));
    }

    public function testExcludeEndDoesNotContainEnd(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
            excludeEnd: true,
        );

        $this->assertFalse($range->contains(new DateTimeImmutable('2024-01-31')));
    }

    public function testExcludeEndContainsDateBeforeEnd(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
            excludeEnd: true,
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-01-30')));
    }

    public function testExcludeEndSingleDayRangeIsEmpty(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-06-15'),
            new DateTimeImmutable('2024-06-15'),
            excludeEnd: true,
        );

        $this->assertFalse($range->contains(new DateTimeImmutable('2024-06-15')));
    }

    public function testContainsAcceptsDateTimeInterface(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-01-31'),
        );

        $this->assertTrue($range->contains(new DateTime('2024-01-15')));
        $this->assertFalse($range->contains(new DateTime('2024-02-15')));
    }

    public function testToString(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-01-01'),
            new DateTimeImmutable('2024-12-31'),
        );

        $this->assertSame('2024-01-01 - 2024-12-31', (string) $range);
    }

    public function testToStringExcludeEndSameFormat(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-03-21'),
            new DateTimeImmutable('2024-04-19'),
            excludeEnd: true,
        );

        $this->assertSame('2024-03-21 - 2024-04-19', (string) $range);
    }

    public function testSpanningYearBoundary(): void
    {
        $range = new DateRange(
            new DateTimeImmutable('2024-12-22'),
            new DateTimeImmutable('2025-01-20'),
        );

        $this->assertTrue($range->contains(new DateTimeImmutable('2024-12-25')));
        $this->assertTrue($range->contains(new DateTimeImmutable('2025-01-01')));
        $this->assertTrue($range->contains(new DateTimeImmutable('2025-01-20')));
        $this->assertFalse($range->contains(new DateTimeImmutable('2024-12-21')));
        $this->assertFalse($range->contains(new DateTimeImmutable('2025-01-21')));
    }
}
