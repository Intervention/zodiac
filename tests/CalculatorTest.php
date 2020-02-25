<?php

namespace Intervention\Zodiac\Test;

use Illuminate\Translation\Translator;
use Intervention\Zodiac\Calculator as ZodiacCalculator;
use Intervention\Zodiac\Calculator;
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
use DateTime;

class CalculatorTest extends TestCase
{
    public function testConstructor()
    {
        $translator = $this->createMock(Translator::class);
        $calculator = new ZodiacCalculator($translator);
        $this->assertInstanceOf(Calculator::class, $calculator);
        $this->assertInstanceOf(Translator::class, $calculator->translator);
    }

    public function testMakeFromString()
    {
        $translator = $this->createMock(Translator::class);
        $calculator = new ZodiacCalculator($translator);

        $this->assertInstanceOf(Aries::class, $calculator->make('1977-03-27'));
        $this->assertInstanceOf(Taurus::class, $calculator->make('1977-04-27'));
        $this->assertInstanceOf(Gemini::class, $calculator->make('1977-05-27'));
        $this->assertInstanceOf(Cancer::class, $calculator->make('1977-06-27'));
        $this->assertInstanceOf(Leo::class, $calculator->make('1977-07-27'));
        $this->assertInstanceOf(Virgo::class, $calculator->make('1977-08-27'));
        $this->assertInstanceOf(Libra::class, $calculator->make('1977-09-27'));
        $this->assertInstanceOf(Scorpio::class, $calculator->make('1977-10-27'));
        $this->assertInstanceOf(Sagittarius::class, $calculator->make('1977-11-27'));
        $this->assertInstanceOf(Capricorn::class, $calculator->make('1977-12-27'));
        $this->assertInstanceOf(Capricorn::class, $calculator->make('1977-12-31 23:59:59'));
        $this->assertInstanceOf(Capricorn::class, $calculator->make('1977-01-15'));
        $this->assertInstanceOf(Aquarius::class, $calculator->make('1977-01-26'));
        $this->assertInstanceOf(Pisces::class, $calculator->make('1977-02-27'));
    }

    public function testMakeFromObject()
    {
        $translator = $this->createMock(Translator::class);
        $calculator = new ZodiacCalculator($translator);

        $this->assertInstanceOf(Aries::class, $calculator->make(new DateTime('1977-03-27')));
        $this->assertInstanceOf(Taurus::class, $calculator->make(new DateTime('1977-04-27')));
        $this->assertInstanceOf(Gemini::class, $calculator->make(new DateTime('1977-05-27')));
        $this->assertInstanceOf(Cancer::class, $calculator->make(new DateTime('1977-06-27')));
        $this->assertInstanceOf(Leo::class, $calculator->make(new DateTime('1977-07-27')));
        $this->assertInstanceOf(Virgo::class, $calculator->make(new DateTime('1977-08-27')));
        $this->assertInstanceOf(Libra::class, $calculator->make(new DateTime('1977-09-27')));
        $this->assertInstanceOf(Scorpio::class, $calculator->make(new DateTime('1977-10-27')));
        $this->assertInstanceOf(Sagittarius::class, $calculator->make(new DateTime('1977-11-27')));
        $this->assertInstanceOf(Capricorn::class, $calculator->make(new DateTime('1977-12-27')));
        $this->assertInstanceOf(Capricorn::class, $calculator->make(new DateTime('1977-12-31')));
        $this->assertInstanceOf(Capricorn::class, $calculator->make(new DateTime('1977-01-01')));
        $this->assertInstanceOf(Capricorn::class, $calculator->make(new DateTime('1977-01-15')));
        $this->assertInstanceOf(Aquarius::class, $calculator->make(new DateTime('1977-01-26')));
        $this->assertInstanceOf(Pisces::class, $calculator->make(new DateTime('1977-02-27')));
    }
}
