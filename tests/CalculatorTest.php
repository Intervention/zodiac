<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\Carbon;
use DateTime;
use Generator;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Zodiacs\Aquarius;
use Intervention\Zodiac\Zodiacs\Aries;
use Intervention\Zodiac\Zodiacs\Cancer;
use Intervention\Zodiac\Zodiacs\Capricorn;
use Intervention\Zodiac\Zodiacs\Gemini;
use Intervention\Zodiac\Zodiacs\Leo;
use Intervention\Zodiac\Zodiacs\Libra;
use Intervention\Zodiac\Zodiacs\Pisces;
use Intervention\Zodiac\Zodiacs\Sagittarius;
use Intervention\Zodiac\Zodiacs\Scorpio;
use Intervention\Zodiac\Zodiacs\Taurus;
use Intervention\Zodiac\Zodiacs\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    #[DataProvider('validZodiacDataProvider')]
    public function testValidCalculatorInputs(string|DateTime $input, string $resultClassname): void
    {
        $this->assertInstanceOf($resultClassname, (new Calculator())->zodiac($input));
        $this->assertInstanceOf($resultClassname, Calculator::make($input));
    }

    public static function validZodiacDataProvider(): Generator
    {
        yield ['1977-03-27', Aries::class];
        yield ['1977-04-27', Taurus::class];
        yield ['1977-05-27', Gemini::class];
        yield ['1977-06-27', Cancer::class];
        yield ['1977-07-27', Leo::class];
        yield ['1977-08-27', Virgo::class];
        yield ['1977-09-27', Libra::class];
        yield ['1977-10-27', Scorpio::class];
        yield ['1977-11-27', Sagittarius::class];
        yield ['1977-12-27', Capricorn::class];
        yield ['1977-12-31 23:59:59', Capricorn::class];
        yield ['1977-01-15', Capricorn::class];
        yield ['1977-01-26', Aquarius::class];
        yield ['1977-02-27', Pisces::class];
        yield [new DateTime('1977-03-27'), Aries::class];
        yield [new DateTime('1977-04-27'), Taurus::class];
        yield [new DateTime('1977-05-27'), Gemini::class];
        yield [new DateTime('1977-06-27'), Cancer::class];
        yield [new DateTime('1977-07-27'), Leo::class];
        yield [new DateTime('1977-06-21'), Gemini::class];
        yield [new DateTime('1977-08-27'), Virgo::class];
        yield [new DateTime('1977-09-27'), Libra::class];
        yield [new DateTime('1977-10-27'), Scorpio::class];
        yield [new DateTime('1977-11-27'), Sagittarius::class];
        yield [new DateTime('1977-12-27'), Capricorn::class];
        yield [new DateTime('1977-12-31'), Capricorn::class];
        yield [new DateTime('1977-01-01'), Capricorn::class];
        yield [new DateTime('1977-01-15'), Capricorn::class];
        yield [new DateTime('1977-01-26'), Aquarius::class];
        yield [new DateTime('1977-02-27'), Pisces::class];
        yield [Carbon::parse('1977-03-27'), Aries::class];
        yield [Carbon::parse('1977-04-27'), Taurus::class];
        yield [Carbon::parse('1977-05-27'), Gemini::class];
        yield [Carbon::parse('1977-06-27'), Cancer::class];
        yield [Carbon::parse('1977-07-27'), Leo::class];
        yield [Carbon::parse('1977-06-21'), Gemini::class];
        yield [Carbon::parse('1977-08-27'), Virgo::class];
        yield [Carbon::parse('1977-09-27'), Libra::class];
        yield [Carbon::parse('1977-10-27'), Scorpio::class];
        yield [Carbon::parse('1977-11-27'), Sagittarius::class];
        yield [Carbon::parse('1977-12-27'), Capricorn::class];
        yield [Carbon::parse('1977-12-31'), Capricorn::class];
        yield [Carbon::parse('1977-01-01'), Capricorn::class];
        yield [Carbon::parse('1977-01-15'), Capricorn::class];
        yield [Carbon::parse('1977-01-26'), Aquarius::class];
        yield [Carbon::parse('1977-02-27'), Pisces::class];
    }

    #[DataProvider('invalidZodiacDataProvider')]
    public function testGetInvalidZodiac(mixed $input): void
    {
        $this->expectException(NotReadableException::class);
        $calculator = new Calculator();
        $calculator->zodiac($input);
    }

    public static function invalidZodiacDataProvider(): Generator
    {
        yield [
            null,
            true,
            false,
            'foobar',
            '',
            0,
            1,
            2,
        ];
    }
}
