<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeImmutable;
use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Chinese\NewYear;
use PHPUnit\Framework\TestCase;

class NewYearTest extends TestCase
{
    public function testInputOutput(): void
    {
        $newYear = new NewYear(2001, 10, 24, ChineseSign::Rabbit);
        $this->assertEquals(2001, (int) $newYear->date->format('Y'));
        $this->assertEquals(10, (int) $newYear->date->format('m'));
        $this->assertEquals(24, (int) $newYear->date->format('d'));
        $this->assertSame(ChineseSign::Rabbit, $newYear->sign);
        $this->assertSame(ChineseSign::Rabbit, $newYear->sign());
        $this->assertInstanceOf(DateTimeImmutable::class, $newYear->date());
    }
}
