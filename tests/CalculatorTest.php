<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Tests\Providers\InvalidDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\Signs\Aries;
use Intervention\Zodiac\Western\Signs\Leo;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;
use Stringable;

final class CalculatorTest extends TestCase
{
    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    public function testFromString(string|Stringable $input, string $resultClassname, Calendar $calendar): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromString($input, $calendar));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromString($input, $calendar));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'carbonDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'carbonDates')]
    public function testFromDate(DateTimeInterface $input, string $resultClassname, Calendar $calendar): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromDate($input, $calendar));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromDate($input, $calendar));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testFromUnix(int|string $input, string $resultClassname, Calendar $calendar): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromUnix($input, $calendar));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromUnix($input, $calendar));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'carbonDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'carbonDates')]
    public function testFromCarbon(CarbonInterface $input, string $resultClassname, Calendar $calendar): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromCarbon($input, $calendar));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromCarbon($input, $calendar));
    }

    #[DataProviderExternal(InvalidDataProvider::class, 'invalidStringDates')]
    public function testGetInvalidZodiac(mixed $input): void
    {
        $this->expectException(NotReadableException::class);
        (new Calculator())->fromString($input);
    }

    public function testCompare(): void
    {
        $calculator = new Calculator();
        $result = $calculator->compare(new Aries(), new Leo());
        $this->assertIsFloat($result);
        $this->assertTrue($result >= 0 && $result <= 1);

        $result = Calculator::compare(new Aries(), new Leo());
        $this->assertIsFloat($result);
        $this->assertTrue($result >= 0 && $result <= 1);
    }
}
