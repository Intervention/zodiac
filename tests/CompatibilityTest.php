<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Intervention\Zodiac\Compatibility;
use Intervention\Zodiac\Zodiacs\Aquarius;
use Intervention\Zodiac\Zodiacs\Aries;
use Intervention\Zodiac\Zodiacs\Cancer;
use Intervention\Zodiac\Zodiacs\Capricorn;
use Intervention\Zodiac\Zodiacs\Gemini;
use Intervention\Zodiac\Zodiacs\Leo;
use Intervention\Zodiac\Zodiacs\Libra;
use Intervention\Zodiac\Zodiacs\Pisces;
use Intervention\Zodiac\Zodiacs\Sagittarius;
use Intervention\Zodiac\Zodiacs\Scorpio;
use Intervention\Zodiac\Zodiacs\Taurus;
use Intervention\Zodiac\Zodiacs\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CompatibilityTest extends TestCase
{
    #[DataProvider('factorDataProvider')]
    public function testCalculate(string $a, string $b): void
    {
        $result = call_user_func(new Compatibility(), new $a(), new $b());
        $this->assertIsInt($result);
        $this->assertTrue(in_array($result, range(0, 10)));
    }

    public static function factorDataProvider(): array
    {
        $data = [];

        $zodiacs = [
            Aquarius::class,
            Aries::class,
            Cancer::class,
            Capricorn::class,
            Gemini::class,
            Leo::class,
            Libra::class,
            Pisces::class,
            Sagittarius::class,
            Scorpio::class,
            Taurus::class,
            Virgo::class,
        ];

        foreach ($zodiacs as $a) {
            foreach ($zodiacs as $b) {
                $data[] = [$a, $b];
            }
        }

        return $data;
    }
}
