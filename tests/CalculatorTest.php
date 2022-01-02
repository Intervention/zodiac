<?php

namespace Intervention\Zodiac\Test;

use DateTime;
use Intervention\Zodiac\AbstractZodiac;
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
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testMake(): void
    {
        $result = Calculator::make('1979-12-12');
        $this->assertInstanceOf(Sagittarius::class, $result);
    }

    public function testGetZodiacFromString()
    {
        $calculator = new Calculator();

        $this->assertInstanceOf(Aries::class, $calculator->getZodiac('1977-03-27'));
        $this->assertInstanceOf(Taurus::class, $calculator->getZodiac('1977-04-27'));
        $this->assertInstanceOf(Gemini::class, $calculator->getZodiac('1977-05-27'));
        $this->assertInstanceOf(Cancer::class, $calculator->getZodiac('1977-06-27'));
        $this->assertInstanceOf(Leo::class, $calculator->getZodiac('1977-07-27'));
        $this->assertInstanceOf(Virgo::class, $calculator->getZodiac('1977-08-27'));
        $this->assertInstanceOf(Libra::class, $calculator->getZodiac('1977-09-27'));
        $this->assertInstanceOf(Scorpio::class, $calculator->getZodiac('1977-10-27'));
        $this->assertInstanceOf(Sagittarius::class, $calculator->getZodiac('1977-11-27'));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac('1977-12-27'));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac('1977-12-31 23:59:59'));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac('1977-01-15'));
        $this->assertInstanceOf(Aquarius::class, $calculator->getZodiac('1977-01-26'));
        $this->assertInstanceOf(Pisces::class, $calculator->getZodiac('1977-02-27'));
    }

    public function testMakeInvalidString()
    {
        $this->expectException(NotReadableException::class);
        $calculator = new Calculator();
        $calculator->getZodiac('foobar');
    }

    public function testMakeFromObject()
    {
        $calculator = new Calculator();

        $this->assertInstanceOf(Aries::class, $calculator->getZodiac(new DateTime('1977-03-27')));
        $this->assertInstanceOf(Taurus::class, $calculator->getZodiac(new DateTime('1977-04-27')));
        $this->assertInstanceOf(Gemini::class, $calculator->getZodiac(new DateTime('1977-05-27')));
        $this->assertInstanceOf(Cancer::class, $calculator->getZodiac(new DateTime('1977-06-27')));
        $this->assertInstanceOf(Leo::class, $calculator->getZodiac(new DateTime('1977-07-27')));
        $this->assertInstanceOf(Gemini::class, $calculator->getZodiac(new DateTime('1977-06-21')));
        $this->assertInstanceOf(Virgo::class, $calculator->getZodiac(new DateTime('1977-08-27')));
        $this->assertInstanceOf(Libra::class, $calculator->getZodiac(new DateTime('1977-09-27')));
        $this->assertInstanceOf(Scorpio::class, $calculator->getZodiac(new DateTime('1977-10-27')));
        $this->assertInstanceOf(Sagittarius::class, $calculator->getZodiac(new DateTime('1977-11-27')));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac(new DateTime('1977-12-27')));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac(new DateTime('1977-12-31')));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac(new DateTime('1977-01-01')));
        $this->assertInstanceOf(Capricorn::class, $calculator->getZodiac(new DateTime('1977-01-15')));
        $this->assertInstanceOf(Aquarius::class, $calculator->getZodiac(new DateTime('1977-01-26')));
        $this->assertInstanceOf(Pisces::class, $calculator->getZodiac(new DateTime('1977-02-27')));
    }
}
