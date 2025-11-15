<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Generator;
use Intervention\Zodiac\Compatibility;
use Intervention\Zodiac\Western\Signs\Aquarius;
use Intervention\Zodiac\Western\Signs\Aries;
use Intervention\Zodiac\Western\Signs\Cancer;
use Intervention\Zodiac\Western\Signs\Capricorn;
use Intervention\Zodiac\Western\Signs\Gemini;
use Intervention\Zodiac\Western\Signs\Leo;
use Intervention\Zodiac\Western\Signs\Libra;
use Intervention\Zodiac\Western\Signs\Pisces;
use Intervention\Zodiac\Western\Signs\Sagittarius;
use Intervention\Zodiac\Western\Signs\Scorpio;
use Intervention\Zodiac\Western\Signs\Taurus;
use Intervention\Zodiac\Western\Signs\Virgo;
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
