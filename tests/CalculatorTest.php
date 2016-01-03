<?php

use Intervention\Zodiac\Calculator as ZodiacCalculator;

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testConstructor()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $calculator = new ZodiacCalculator($translator);
        $this->assertInstanceOf('Intervention\Zodiac\Calculator', $calculator);
        $this->assertInstanceOf('Illuminate\Translation\Translator', $calculator->translator);
    }

    public function testMakeFromString()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $calculator = new ZodiacCalculator($translator);

        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Aries', $calculator->make('1977-03-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Taurus', $calculator->make('1977-04-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Gemini', $calculator->make('1977-05-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Cancer', $calculator->make('1977-06-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Leo', $calculator->make('1977-07-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Virgo', $calculator->make('1977-08-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Libra', $calculator->make('1977-09-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Scorpio', $calculator->make('1977-10-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Sagittarius', $calculator->make('1977-11-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Capricorn', $calculator->make('1977-12-27'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Capricorn', $calculator->make('1977-01-15'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Aquarius', $calculator->make('1977-01-26'));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Pisces', $calculator->make('1977-02-27'));
    }

    public function testMakeFromObject()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $calculator = new ZodiacCalculator($translator);

        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Aries', $calculator->make(new DateTime('1977-03-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Taurus', $calculator->make(new DateTime('1977-04-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Gemini', $calculator->make(new DateTime('1977-05-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Cancer', $calculator->make(new DateTime('1977-06-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Leo', $calculator->make(new DateTime('1977-07-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Virgo', $calculator->make(new DateTime('1977-08-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Libra', $calculator->make(new DateTime('1977-09-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Scorpio', $calculator->make(new DateTime('1977-10-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Sagittarius', $calculator->make(new DateTime('1977-11-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Capricorn', $calculator->make(new DateTime('1977-12-27')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Capricorn', $calculator->make(new DateTime('1977-01-15')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Aquarius', $calculator->make(new DateTime('1977-01-26')));
        $this->assertInstanceOf('Intervention\Zodiac\Zodiacs\Pisces', $calculator->make(new DateTime('1977-02-27')));
    }
}
