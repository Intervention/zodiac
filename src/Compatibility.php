<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Intervention\Zodiac\Interfaces\ZodiacInterface;
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

class Compatibility
{
    /**
     * @var array<string, array<string, int>> $factors
     */
    protected array $factors = [
        Aquarius::class => [
            Aquarius::class => 9,
            Aries::class => 9,
            Cancer::class => 4,
            Capricorn::class => 4,
            Gemini::class => 10,
            Leo::class => 8,
            Libra::class => 7,
            Pisces::class => 6,
            Sagittarius::class => 8,
            Scorpio::class => 4,
            Taurus::class => 5,
            Virgo::class => 7,
        ],
        Aries::class => [
            Aquarius::class => 9,
            Aries::class => 10,
            Cancer::class => 7,
            Capricorn::class => 5,
            Gemini::class => 9,
            Leo::class => 9,
            Libra::class => 9,
            Pisces::class => 7,
            Sagittarius::class => 10,
            Scorpio::class => 6,
            Taurus::class => 6,
            Virgo::class => 7,
        ],
        Cancer::class => [
            Aquarius::class => 4,
            Aries::class => 7,
            Cancer::class => 10,
            Capricorn::class => 8,
            Gemini::class => 6,
            Leo::class => 8,
            Libra::class => 7,
            Pisces::class => 10,
            Sagittarius::class => 5,
            Scorpio::class => 8,
            Taurus::class => 9,
            Virgo::class => 8,
        ],
        Capricorn::class => [
            Aquarius::class => 4,
            Aries::class => 6,
            Cancer::class => 9,
            Capricorn::class => 9,
            Gemini::class => 4,
            Leo::class => 5,
            Libra::class => 5,
            Pisces::class => 8,
            Sagittarius::class => 5,
            Scorpio::class => 9,
            Taurus::class => 9,
            Virgo::class => 10,
        ],
        Gemini::class => [
            Aquarius::class => 10,
            Aries::class => 8,
            Cancer::class => 5,
            Capricorn::class => 5,
            Gemini::class => 6,
            Leo::class => 8,
            Libra::class => 8,
            Pisces::class => 9,
            Sagittarius::class => 7,
            Scorpio::class => 4,
            Taurus::class => 5,
            Virgo::class => 7,
        ],
        Leo::class => [
            Aquarius::class => 9,
            Aries::class => 9,
            Cancer::class => 5,
            Capricorn::class => 4,
            Gemini::class => 8,
            Leo::class => 7,
            Libra::class => 8,
            Pisces::class => 7,
            Sagittarius::class => 5,
            Scorpio::class => 7,
            Taurus::class => 7,
            Virgo::class => 8,
        ],
        Libra::class => [
            Aquarius::class => 7,
            Aries::class => 9,
            Cancer::class => 5,
            Capricorn::class => 7,
            Gemini::class => 9,
            Leo::class => 8,
            Libra::class => 9,
            Pisces::class => 5,
            Sagittarius::class => 8,
            Scorpio::class => 5,
            Taurus::class => 5,
            Virgo::class => 7,
        ],
        Pisces::class => [
            Aquarius::class => 9,
            Aries::class => 5,
            Cancer::class => 10,
            Capricorn::class => 9,
            Gemini::class => 9,
            Leo::class => 5,
            Libra::class => 5,
            Pisces::class => 5,
            Sagittarius::class => 5,
            Scorpio::class => 8,
            Taurus::class => 6,
            Virgo::class => 8,
        ],
        Sagittarius::class => [
            Aquarius::class => 8,
            Aries::class => 8,
            Cancer::class => 5,
            Capricorn::class => 4,
            Gemini::class => 8,
            Leo::class => 7,
            Libra::class => 8,
            Pisces::class => 6,
            Sagittarius::class => 8,
            Scorpio::class => 4,
            Taurus::class => 5,
            Virgo::class => 7,
        ],
        Scorpio::class => [
            Aquarius::class => 6,
            Aries::class => 6,
            Cancer::class => 9,
            Capricorn::class => 9,
            Gemini::class => 4,
            Leo::class => 7,
            Libra::class => 5,
            Pisces::class => 8,
            Sagittarius::class => 4,
            Scorpio::class => 10,
            Taurus::class => 9,
            Virgo::class => 10,
        ],
        Taurus::class => [
            Aquarius::class => 6,
            Aries::class => 6,
            Cancer::class => 9,
            Capricorn::class => 10,
            Gemini::class => 5,
            Leo::class => 6,
            Libra::class => 6,
            Pisces::class => 6,
            Sagittarius::class => 5,
            Scorpio::class => 9,
            Taurus::class => 9,
            Virgo::class => 9,
        ],
        Virgo::class => [
            Aquarius::class => 7,
            Aries::class => 7,
            Cancer::class => 8,
            Capricorn::class => 9,
            Gemini::class => 8,
            Leo::class => 5,
            Libra::class => 6,
            Pisces::class => 9,
            Sagittarius::class => 7,
            Scorpio::class => 9,
            Taurus::class => 9,
            Virgo::class => 9,
        ],
    ];

    /**
     * Calculate zodiac sign compatibility between two signs
     *
     * @param ZodiacInterface $a
     * @param ZodiacInterface $b
     * @return int
     */
    public function __invoke(ZodiacInterface $a, ZodiacInterface $b): int
    {
        return $this->factors[$a::class][$b::class];
    }
}
