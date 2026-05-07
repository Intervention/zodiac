<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\ChineseSign;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Western\WesternSign;
use PHPUnit\Framework\TestCase;

class AstrologyTest extends TestCase
{
    public function testWesternSigns(): void
    {
        $cases = WesternSign::cases();
        $this->assertCount(12, $cases);

        foreach (Astrology::WESTERN->signs() as $sign) {
            $this->assertInstanceOf(SignInterface::class, $sign);
            $this->assertInstanceOf(WesternSign::class, $sign);
        }
    }

    public function testChineseSigns(): void
    {
        $cases = ChineseSign::cases();
        $this->assertCount(12, $cases);

        foreach (Astrology::CHINESE->signs() as $sign) {
            $this->assertInstanceOf(SignInterface::class, $sign);
            $this->assertInstanceOf(ChineseSign::class, $sign);
        }
    }

    public function testWesternSignCases(): void
    {
        $expected = [
            WesternSign::Aries,
            WesternSign::Taurus,
            WesternSign::Gemini,
            WesternSign::Cancer,
            WesternSign::Leo,
            WesternSign::Virgo,
            WesternSign::Libra,
            WesternSign::Scorpio,
            WesternSign::Sagittarius,
            WesternSign::Capricorn,
            WesternSign::Aquarius,
            WesternSign::Pisces,
        ];

        $this->assertEquals($expected, WesternSign::cases());
    }

    public function testChineseSignCases(): void
    {
        $expected = [
            ChineseSign::Rat,
            ChineseSign::Ox,
            ChineseSign::Tiger,
            ChineseSign::Rabbit,
            ChineseSign::Dragon,
            ChineseSign::Snake,
            ChineseSign::Horse,
            ChineseSign::Goat,
            ChineseSign::Monkey,
            ChineseSign::Rooster,
            ChineseSign::Dog,
            ChineseSign::Pig,
        ];

        $this->assertEquals($expected, ChineseSign::cases());
    }
}
