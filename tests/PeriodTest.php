<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\CarbonPeriod;
use Generator;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Intervention\Zodiac\Period;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PeriodTest extends TestCase
{
    #[DataProvider('periodData')]
    public function testContains(CarbonInterface $date, PeriodInterface $period, bool $result): void
    {
        $this->assertEquals($result, $period->contains($date));
        $this->assertIsString((string) $period);
        foreach ($period as $item) {
            $this->assertInstanceOf(CarbonPeriod::class, $item);
        }
    }

    public static function periodData(): Generator
    {
        yield [
            Carbon::parse('2001-01-01'),
            new Period([
                CarbonPeriod::since('2001-01-01')->until('2001-02-05')
            ]),
            true
        ];

        yield [
            Carbon::parse('2001-02-01'),
            new Period([
                CarbonPeriod::since('2001-01-01')->until('2001-02-05')
            ]),
            true
        ];

        yield [
            Carbon::parse('2001-02-05'),
            new Period([
                CarbonPeriod::since('2001-01-01')->until('2001-02-05')
            ]),
            true
        ];

        yield [
            Carbon::parse('2001-06-05'),
            new Period([
                CarbonPeriod::since('2001-01-01')->until('2001-02-05')
            ]),
            false
        ];

        yield [
            Carbon::parse('2001-06-05'),
            new Period([
                CarbonPeriod::since('2001-01-01')->until('2001-02-05'),
                CarbonPeriod::since('2001-06-01')->until('2001-06-06'),
            ]),
            true
        ];

        yield [
            Carbon::parse('2001-06-05'),
            new Period([
                CarbonPeriod::since('2001-06-05')->until('2001-06-05')
            ]),
            true
        ];
    }
}
