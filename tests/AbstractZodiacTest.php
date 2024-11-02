<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\Carbon;
use Intervention\Zodiac\AbstractZodiac;
use PHPUnit\Framework\TestCase;

final class AbstractZodiacTest extends TestCase
{
    public function testMatch(): void
    {
        $zodiac = $this->zodiac();
        $zodiac->start = ['month' => '6', 'day' => '1'];
        $zodiac->end = ['month' => '6', 'day' => '10'];

        $this->assertTrue($zodiac->match(Carbon::create(null, 6, 1)));
        $this->assertTrue($zodiac->match(Carbon::create(null, 6, 10)));
        $this->assertTrue($zodiac->match(Carbon::create(null, 6, 5)));
        $this->assertFalse($zodiac->match(Carbon::create(null, 6, 11)));
    }

    public function testLocalized(): void
    {
        $zodiac = $this->zodiac();
        $zodiac->name = 'gemini';

        $this->assertEquals('Gemini', $zodiac->localized());
    }

    public function testToString(): void
    {
        $zodiac = $this->zodiac();
        $zodiac->name = 'mock';

        $this->assertEquals('mock', strval($zodiac));
    }

    private function zodiac(): AbstractZodiac
    {
        return new class () extends AbstractZodiac
        {
            //
        };
    }
}
