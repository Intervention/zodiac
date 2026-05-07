<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Tests\Providers\ChineseDataProvider;
use Intervention\Zodiac\Tests\Providers\WesternDataProvider;
use Intervention\Zodiac\Western\WesternSign;
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
    public function testCalculate(mixed $input, WesternSign|ChineseSign $expected, Astrology $astrology): void
    {
        $result = (new Calculator($astrology))->calculate($input);
        $this->assertInstanceOf(SignInterface::class, $result);
        $this->assertSame($expected, $result);
    }
}
