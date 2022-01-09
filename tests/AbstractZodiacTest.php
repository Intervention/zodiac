<?php

namespace Intervention\Zodiac\Test;

use Carbon\Carbon;
use Intervention\Zodiac\AbstractZodiac;
use PHPUnit\Framework\TestCase;

class AbstractZodiacTest extends TestCase
{
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
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class);
        $zodiac->name = 'gemini';

        $this->assertEquals('Gemini', $zodiac->localized());
    }

    public function testToString()
    {
        $zodiac = $this->getMockForAbstractClass(AbstractZodiac::class);
        $zodiac->name = 'mock';

        $this->assertEquals('mock', strval($zodiac));
    }
}
