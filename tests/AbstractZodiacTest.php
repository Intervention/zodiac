<?php

namespace Intervention\Zodiac\Test;

use Carbon\Carbon;
use Illuminate\Translation\Translator;
use Intervention\Zodiac\AbstractZodiac;
use PHPUnit\Framework\TestCase;

class AbstractZodiacTest extends TestCase
{
    public function testConstructor()
    {
        $translator = $this->createMock(Translator::class);
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class, [$translator]);
        $this->assertInstanceOf('Intervention\Zodiac\AbstractZodiac', $zodiac);
        $this->assertInstanceOf('Illuminate\Translation\Translator', $zodiac->translator);
    }

    public function testMatch()
    {
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class);
        $zodiac->start = ['month' => '6', 'day' => '1'];
        $zodiac->end = ['month' => '6', 'day' => '10'];

        $this->assertTrue($zodiac->match(Carbon::create(null, 6, 1)));
        $this->assertTrue($zodiac->match(Carbon::create(null, 6, 10)));
        $this->assertTrue($zodiac->match(Carbon::create(null, 6, 5)));
        $this->assertFalse($zodiac->match(Carbon::create(null, 6, 11)));
    }

    public function testLocalized()
    {
        $translator = $this->createMock(Translator::class);
        $translator->method('has')->with($this->equalTo('zodiacs.mock'))->will($this->returnValue(false));
        $translator->method('get')->with($this->equalTo('zodiacs::zodiacs.mock'))->will($this->returnValue('localized'));
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class, [$translator]);
        $zodiac->name = 'mock';

        $this->assertEquals('localized', $zodiac->localized());
    }

    public function testLocalizedWithoutTranslator()
    {
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class);
        $zodiac->name = 'mock';

        $this->assertEquals('zodiacs.mock', $zodiac->localized());
    }

    public function testToString()
    {
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class);
        $zodiac->name = 'mock';

        $this->assertEquals('mock', strval($zodiac));
    }
}
