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
    }

    public function testMakeFromString()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $calculator = new ZodiacCalculator($translator);

        $this->assertEquals('aries', $calculator->make('1977-03-27'));
        $this->assertEquals('taurus', $calculator->make('1977-04-27'));
        $this->assertEquals('gemini', $calculator->make('1977-05-27'));
        $this->assertEquals('cancer', $calculator->make('1977-06-27'));
        $this->assertEquals('leo', $calculator->make('1977-07-27'));
        $this->assertEquals('virgo', $calculator->make('1977-08-27'));
        $this->assertEquals('libra', $calculator->make('1977-09-27'));
        $this->assertEquals('scorpio', $calculator->make('1977-10-27'));
        $this->assertEquals('sagittarius', $calculator->make('1977-11-27'));
        $this->assertEquals('capricorn', $calculator->make('1977-12-27'));
        $this->assertEquals('capricorn', $calculator->make('1977-01-15'));
        $this->assertEquals('aquarius', $calculator->make('1977-01-26'));
        $this->assertEquals('pisces', $calculator->make('1977-02-27'));
    }

    public function testMakeFromObject()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $calculator = new ZodiacCalculator($translator);

        $this->assertEquals('aries', $calculator->make(new DateTime('1977-03-27')));
        $this->assertEquals('taurus', $calculator->make(new DateTime('1977-04-27')));
        $this->assertEquals('gemini', $calculator->make(new DateTime('1977-05-27')));
        $this->assertEquals('cancer', $calculator->make(new DateTime('1977-06-27')));
        $this->assertEquals('leo', $calculator->make(new DateTime('1977-07-27')));
        $this->assertEquals('virgo', $calculator->make(new DateTime('1977-08-27')));
        $this->assertEquals('libra', $calculator->make(new DateTime('1977-09-27')));
        $this->assertEquals('scorpio', $calculator->make(new DateTime('1977-10-27')));
        $this->assertEquals('sagittarius', $calculator->make(new DateTime('1977-11-27')));
        $this->assertEquals('capricorn', $calculator->make(new DateTime('1977-12-27')));
        $this->assertEquals('capricorn', $calculator->make(new DateTime('1977-01-15')));
        $this->assertEquals('aquarius', $calculator->make(new DateTime('1977-01-26')));
        $this->assertEquals('pisces', $calculator->make(new DateTime('1977-02-27')));
    }

    public function testMakeLocalized()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $translator->shouldReceive('has')->once()->with('zodiacs.gemini')->andReturn(false);
        $translator->shouldReceive('get')->once()->with('zodiacs::zodiacs.gemini')->andReturn('mock');
        $calculator = new ZodiacCalculator($translator);

        $this->assertEquals('mock', $calculator->makeLocalized('1977-06-17'));
    }
}
