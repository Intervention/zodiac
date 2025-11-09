<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\ChineseNewYearCalculator;
use PHPUnit\Framework\TestCase;

class ChineseNewYearCalculatorTest extends TestCase
{
    public function testNewYear(): void
    {
        $newYear = ChineseNewYearCalculator::newYear(2000);
        $this->assertEquals(2000, $newYear['day'][0]);
        $this->assertEquals(2, $newYear['day'][1]);
        $this->assertEquals(5, $newYear['day'][2]);
    }
}
