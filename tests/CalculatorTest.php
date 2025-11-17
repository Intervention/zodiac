<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\Signs\Sign as ChineseSign;
use Intervention\Zodiac\Western\Signs\Sign as WesternSign;
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
    public function testConstructors(): void
    {
        $this->assertInstanceOf(
            WesternSign::class,
            (new Calculator(Astrology::WESTERN))->fromString('2001-01-01'),
        );

        $this->assertInstanceOf(
            ChineseSign::class,
            (new Calculator(Astrology::CHINESE))->fromString('2001-01-01'),
        );

        $this->assertInstanceOf(
            WesternSign::class,
            Calculator::western()->fromString('2001-01-01'),
        );

        $this->assertInstanceOf(
            ChineseSign::class,
            Calculator::chinese()->fromString('2001-01-01'),
        );

        $this->assertInstanceOf(
            WesternSign::class,
            Calculator::withAstrology(Astrology::WESTERN)->fromString('2001-01-01'),
        );

        $this->assertInstanceOf(
            ChineseSign::class,
            Calculator::withAstrology(Astrology::CHINESE)->fromString('2001-01-01'),
        );

        $this->assertInstanceOf(
            ChineseSign::class,
            (new Calculator(Astrology::WESTERN))->fromString('2001-01-01', Astrology::CHINESE),
        );

        $this->assertInstanceOf(
            WesternSign::class,
            (new Calculator(Astrology::CHINESE))->fromString('2001-01-01', Astrology::WESTERN),
        );

        $this->assertInstanceOf(
            ChineseSign::class,
            Calculator::western()->fromString('2001-01-01', Astrology::CHINESE),
        );

        $this->assertInstanceOf(
            WesternSign::class,
            Calculator::chinese()->fromString('2001-01-01', Astrology::WESTERN),
        );

        $this->assertInstanceOf(
            ChineseSign::class,
            Calculator::withAstrology(Astrology::WESTERN)->fromString('2001-01-01', Astrology::CHINESE),
        );

        $this->assertInstanceOf(
            WesternSign::class,
            Calculator::withAstrology(Astrology::CHINESE)->fromString('2001-01-01', Astrology::WESTERN),
        );
    }

    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    public function testFromString(string|Stringable $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromString($input, $astrology));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromString($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'carbonDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'carbonDates')]
    public function testFromDate(DateTimeInterface $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromDate($input, $astrology));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromDate($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testFromUnix(int|string $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromUnix($input, $astrology));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromUnix($input, $astrology));
    }

    #[DataProviderExternal(WesternDataProvider::class, 'carbonDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'carbonDates')]
    public function testFromCarbon(CarbonInterface $input, string $resultClassname, Astrology $astrology): void
    {
        $this->assertInstanceOf($resultClassname, Calculator::fromCarbon($input, $astrology));
        $this->assertInstanceOf($resultClassname, (new Calculator())->fromCarbon($input, $astrology));
    }

    #[DataProviderExternal(InvalidDataProvider::class, 'invalidStringDates')]
    public function testGetInvalidZodiacStrings(mixed $input): void
    {
        $this->expectException(NotReadableException::class);
        (new Calculator())->fromString($input);
    }

    #[DataProviderExternal(InvalidDataProvider::class, 'invalidUnixDates')]
    public function testGetInvalidZodiacUnix(mixed $input): void
    {
        $this->expectException(NotReadableException::class);
        (new Calculator())->fromUnix($input);
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
