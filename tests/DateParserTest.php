<?php

namespace Intervention\Zodiac\Test;

use Carbon\Carbon;
use DateTime;
use Intervention\Zodiac\DateParser;
use Intervention\Zodiac\Exceptions\NotReadableException;
use PHPUnit\Framework\TestCase;

class DateParserTest extends TestCase
{
    public function testParseString()
    {
        $carbon = DateParser::parse('2000-11-11');
        $this->assertInstanceOf(Carbon::class, $carbon);
    }

    public function testParseInt()
    {
        $carbon = DateParser::parse(100000);
        $this->assertInstanceOf(Carbon::class, $carbon);
    }

    public function testParseDateTime()
    {
        $carbon = DateParser::parse(new DateTime);
        $this->assertInstanceOf(Carbon::class, $carbon);
    }
}
