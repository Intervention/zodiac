<?php

class AbstractZodiacTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testConstructor()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $zodiac = $this->getMockForAbstractClass('\Intervention\Zodiac\AbstractZodiac', [$translator]);
        $this->assertInstanceOf('Intervention\Zodiac\AbstractZodiac', $zodiac);
        $this->assertInstanceOf('Illuminate\Translation\Translator', $zodiac->translator);
    }

    public function testMatch()
    {
        $zodiac = $this->getMockForAbstractClass('\Intervention\Zodiac\AbstractZodiac');
        $zodiac->start = ['month' => '6', 'day' => '1'];
        $zodiac->end = ['month' => '6', 'day' => '10'];

        $this->assertTrue($zodiac->match(Carbon\Carbon::create(null, 6, 1)));
        $this->assertTrue($zodiac->match(Carbon\Carbon::create(null, 6, 10)));
        $this->assertTrue($zodiac->match(Carbon\Carbon::create(null, 6, 5)));
        $this->assertFalse($zodiac->match(Carbon\Carbon::create(null, 6, 11)));
    }

    public function testLocalized()
    {
        $translator = Mockery::mock('Illuminate\Translation\Translator');
        $translator->shouldReceive('has')->once()->with('zodiacs.mock')->andReturn(false);
        $translator->shouldReceive('get')->once()->with('zodiacs::zodiacs.mock')->andReturn('localized');
        $zodiac = $this->getMockForAbstractClass('\Intervention\Zodiac\AbstractZodiac', [$translator]);
        $zodiac->name = 'mock';

        $this->assertEquals('localized', $zodiac->localized());
    }

    public function testLocalizedWithoutTranslator()
    {
        $zodiac = $this->getMockForAbstractClass('\Intervention\Zodiac\AbstractZodiac');
        $zodiac->name = 'mock';

        $this->assertEquals('zodiacs.mock', $zodiac->localized());
    }

    public function testToString()
    {
        $zodiac = $this->getMockForAbstractClass('\Intervention\Zodiac\AbstractZodiac');
        $zodiac->name = 'mock';

        $this->assertEquals('mock', strval($zodiac));
    }

}
