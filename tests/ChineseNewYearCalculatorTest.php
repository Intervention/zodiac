<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\CarbonInterface;
use Intervention\Zodiac\Chinese\NewYearCalculator;
use Intervention\Zodiac\Interfaces\SignInterface;
use PHPUnit\Framework\TestCase;

class ChineseNewYearCalculatorTest extends TestCase
{
    public function testNewYear(): void
    {
        [$date, $classname] = NewYearCalculator::newYear(2000);
        $this->assertInstanceOf(CarbonInterface::class, $date);
        $this->assertInstanceOf(SignInterface::class, new $classname());
    }
}
