<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use DateTimeImmutable;
use Intervention\Zodiac\Chinese\NewYear;
use Intervention\Zodiac\Chinese\Signs\Rabbit;
use PHPUnit\Framework\TestCase;

final class NewYearTest extends TestCase
{
    public function testInputOutput(): void
    {
        $newYear = new NewYear(2001, 10, 24, Rabbit::class);
        $this->assertEquals(2001, (int) $newYear->date->format('Y'));
        $this->assertEquals(10, (int) $newYear->date->format('m'));
        $this->assertEquals(24, (int) $newYear->date->format('d'));
        $this->assertEquals($newYear->sign, Rabbit::class);
        $this->assertInstanceOf(Rabbit::class, $newYear->sign());
        $this->assertInstanceOf(DateTimeImmutable::class, $newYear->date());
    }
}
