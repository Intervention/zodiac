<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeImmutable;
use DateTimeInterface;
use Generator;
use Intervention\Zodiac\DateRange;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class PeriodTest extends TestCase
{
    #[DataProvider('periodData')]
    public function testContains(DateTimeInterface $date, PeriodInterface $period, bool $result): void
    {
        $this->assertEquals($result, $period->contains($date));
        $this->assertIsString((string) $period);
        foreach ($period as $item) {
            $this->assertInstanceOf(DateRange::class, $item);
        }
    }

    public static function periodData(): Generator
    {
        yield [
            new DateTimeImmutable('2001-01-01'),
            new Period([
                new DateRange(new DateTimeImmutable('2001-01-01'), new DateTimeImmutable('2001-02-05'))
            ]),
            true
        ];

        yield [
            new DateTimeImmutable('2001-02-01'),
            new Period([
                new DateRange(new DateTimeImmutable('2001-01-01'), new DateTimeImmutable('2001-02-05'))
            ]),
            true
        ];

        yield [
            new DateTimeImmutable('2001-02-05'),
            new Period([
                new DateRange(new DateTimeImmutable('2001-01-01'), new DateTimeImmutable('2001-02-05'))
            ]),
            true
        ];

        yield [
            new DateTimeImmutable('2001-06-05'),
            new Period([
                new DateRange(new DateTimeImmutable('2001-01-01'), new DateTimeImmutable('2001-02-05'))
            ]),
            false
        ];

        yield [
            new DateTimeImmutable('2001-06-05'),
            new Period([
                new DateRange(new DateTimeImmutable('2001-01-01'), new DateTimeImmutable('2001-02-05')),
                new DateRange(new DateTimeImmutable('2001-06-01'), new DateTimeImmutable('2001-06-06')),
            ]),
            true
        ];

        yield [
            new DateTimeImmutable('2001-06-05'),
            new Period([
                new DateRange(new DateTimeImmutable('2001-06-05'), new DateTimeImmutable('2001-06-05'))
            ]),
            true
        ];
    }
}
