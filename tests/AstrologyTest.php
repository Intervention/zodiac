<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests;

use Generator;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Chinese\Signs\Dog;
use Intervention\Zodiac\Chinese\Signs\Dragon;
use Intervention\Zodiac\Chinese\Signs\Goat;
use Intervention\Zodiac\Chinese\Signs\Horse;
use Intervention\Zodiac\Chinese\Signs\Monkey;
use Intervention\Zodiac\Chinese\Signs\Ox;
use Intervention\Zodiac\Chinese\Signs\Pig;
use Intervention\Zodiac\Chinese\Signs\Rabbit;
use Intervention\Zodiac\Chinese\Signs\Rat;
use Intervention\Zodiac\Chinese\Signs\Rooster;
use Intervention\Zodiac\Chinese\Signs\Snake;
use Intervention\Zodiac\Chinese\Signs\Tiger;
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

class AstrologyTest extends TestCase
{
    /**
     * @param array<string> $classes
     */
    #[DataProvider('zodiacClassnameProvider')]
    public function testZodiacClassnames(Astrology $astrology, array $classes): void
    {
        $this->assertEquals($classes, $astrology->signClassnames());
    }

    public static function zodiacClassnameProvider(): Generator
    {
        yield [
            Astrology::WESTERN,
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

        yield [
            Astrology::CHINESE,
            [
                Rat::class,
                Ox::class,
                Tiger::class,
                Rabbit::class,
                Dragon::class,
                Snake::class,
                Horse::class,
                Goat::class,
                Monkey::class,
                Rooster::class,
                Dog::class,
                Pig::class,
            ]
        ];
    }
}
