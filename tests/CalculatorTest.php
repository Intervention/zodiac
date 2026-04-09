<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    public function testConstructor(): void
    {
        $this->assertInstanceOf(Calculator::class, new Calculator());
        $this->assertInstanceOf(Calculator::class, new Calculator(Astrology::CHINESE));
    }

    public function testStaticConstructors(): void
    {
        $this->assertInstanceOf(Calculator::class, Calculator::create());
        $this->assertInstanceOf(Calculator::class, Calculator::create(Astrology::CHINESE));
        $this->assertInstanceOf(Calculator::class, Calculator::western());
        $this->assertInstanceOf(Calculator::class, Calculator::chinese());
    }

    #[DataProviderExternal(WesternDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'dateTimeDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'stringableDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'stringableDates')]
    #[DataProviderExternal(WesternDataProvider::class, 'unixTimestampDates')]
    #[DataProviderExternal(ChineseDataProvider::class, 'unixTimestampDates')]
    public function testCalculate(mixed $input, string $sign, Astrology $astrology): void
    {
        $this->assertInstanceOf($sign, (new Calculator($astrology))->calculate($input));
    }
}
