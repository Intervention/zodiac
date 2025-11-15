<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Chinese\NewYear;
use Intervention\Zodiac\Chinese\NewYearCalculator;
use Intervention\Zodiac\Interfaces\SignInterface;
use PHPUnit\Framework\TestCase;

class ChineseNewYearCalculatorTest extends TestCase
{
    public function testNewYear(): void
    {
        $newYear = NewYearCalculator::newYear(2000);
        $this->assertInstanceOf(NewYear::class, $newYear);
        $this->assertInstanceOf(SignInterface::class, $newYear->sign());
    }
}
