<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Carbon\CarbonInterface;
use Intervention\Zodiac\Chinese\NewYear;
use Intervention\Zodiac\Chinese\Signs\Rabbit;
use PHPUnit\Framework\TestCase;

class NewYearTest extends TestCase
{
    public function testInputOutput(): void
    {
        $newYear = new NewYear(2001, 10, 24, Rabbit::class);
        $this->assertEquals($newYear->date->year, 2001);
        $this->assertEquals($newYear->date->month, 10);
        $this->assertEquals($newYear->date->day, 24);
        $this->assertEquals($newYear->sign, Rabbit::class);
        $this->assertInstanceOf(Rabbit::class, $newYear->sign());
        $this->assertInstanceOf(CarbonInterface::class, $newYear->date());
    }
}
