<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\AbstractZodiac;
use PHPUnit\Framework\TestCase;

final class AbstractZodiacTest extends TestCase
{
    public function testLocalized(): void
    {
        $zodiac = $this->zodiac(name: 'gemini');
        $this->assertEquals('Gemini', $zodiac->localized());
    }

    public function testToString(): void
    {
        $zodiac = $this->zodiac(name: 'test');
        $this->assertEquals('test', strval($zodiac));
    }

    private function zodiac(
        int $startMonth = 1,
        int $startDay = 1,
        int $endMonth = 2,
        int $endDay = 2,
        string $name = 'test',
        string $html = 'test',
    ): AbstractZodiac {
        return new class (
            $startDay,
            $startMonth,
            $endDay,
            $endMonth,
            $name,
            $html,
        ) extends AbstractZodiac {
            public function __construct(
                int $startDay,
                int $startMonth,
                int $endDay,
                int $endMonth,
                string $name,
                string $html
            ) {
                $this->startDay = $startDay;
                $this->startMonth = $startMonth;
                $this->endDay = $endDay;
                $this->endMonth = $endMonth;
                $this->name = $name;
                $this->html = $html;
            }
        };
    }
}
