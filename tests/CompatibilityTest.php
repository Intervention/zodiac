<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Generator;
use Intervention\Zodiac\Compatibility;
use Intervention\Zodiac\Signs\Western\Aquarius;
use Intervention\Zodiac\Signs\Western\Aries;
use Intervention\Zodiac\Signs\Western\Cancer;
use Intervention\Zodiac\Signs\Western\Capricorn;
use Intervention\Zodiac\Signs\Western\Gemini;
use Intervention\Zodiac\Signs\Western\Leo;
use Intervention\Zodiac\Signs\Western\Libra;
use Intervention\Zodiac\Signs\Western\Pisces;
use Intervention\Zodiac\Signs\Western\Sagittarius;
use Intervention\Zodiac\Signs\Western\Scorpio;
use Intervention\Zodiac\Signs\Western\Taurus;
use Intervention\Zodiac\Signs\Western\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CompatibilityTest extends TestCase
{
    #[DataProvider('factorDataProvider')]
    public function testCalculate(string $a, string $b): void
    {
        $result = call_user_func(new Compatibility(), new $a(), new $b());
        $this->assertIsFloat($result);
        $this->assertTrue($result >= 0 && $result <= 1);
    }

    public static function factorDataProvider(): Generator
    {
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
                yield [$a, $b];
            }
        }
    }
}
