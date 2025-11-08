<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Generator;
use Intervention\Zodiac\Type;
use Intervention\Zodiac\Zodiacs\Western\Aquarius;
use Intervention\Zodiac\Zodiacs\Western\Aries;
use Intervention\Zodiac\Zodiacs\Western\Cancer;
use Intervention\Zodiac\Zodiacs\Western\Capricorn;
use Intervention\Zodiac\Zodiacs\Western\Gemini;
use Intervention\Zodiac\Zodiacs\Western\Leo;
use Intervention\Zodiac\Zodiacs\Western\Libra;
use Intervention\Zodiac\Zodiacs\Western\Pisces;
use Intervention\Zodiac\Zodiacs\Western\Sagittarius;
use Intervention\Zodiac\Zodiacs\Western\Scorpio;
use Intervention\Zodiac\Zodiacs\Western\Taurus;
use Intervention\Zodiac\Zodiacs\Western\Virgo;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    /**
     * @param array<string> $classes
     */
    #[DataProvider('zodiacClassnameProvider')]
    public function testZodiacClassnames(Type $type, array $classes): void
    {
        $this->assertEquals($classes, $type->zodiacClassnames());
    }

    public static function zodiacClassnameProvider(): Generator
    {
        yield [
            Type::WESTERN,
            [
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
            ]
        ];
    }
}
