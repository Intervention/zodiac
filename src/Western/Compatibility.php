<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western;

use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;
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

class Compatibility
{
    /**
     * @var array<string, array<string, float>> $factors
     */
    protected array $factors = [
        Aquarius::class => [
            Aquarius::class => .9,
            Aries::class => .9,
            Cancer::class => .2,
            Capricorn::class => .3,
            Gemini::class => 1,
            Leo::class => .8,
            Libra::class => .7,
            Pisces::class => .6,
            Sagittarius::class => .8,
            Scorpio::class => .1,
            Taurus::class => .5,
            Virgo::class => .7,
        ],
        Aries::class => [
            Aquarius::class => .9,
            Aries::class => 1,
            Cancer::class => .7,
            Capricorn::class => .5,
            Gemini::class => .9,
            Leo::class => .9,
            Libra::class => .9,
            Pisces::class => .7,
            Sagittarius::class => 1,
            Scorpio::class => .6,
            Taurus::class => .6,
            Virgo::class => .7,
        ],
        Cancer::class => [
            Aquarius::class => .2,
            Aries::class => .7,
            Cancer::class => 1,
            Capricorn::class => .8,
            Gemini::class => .6,
            Leo::class => .8,
            Libra::class => .7,
            Pisces::class => 1,
            Sagittarius::class => .5,
            Scorpio::class => .8,
            Taurus::class => .9,
            Virgo::class => .8,
        ],
        Capricorn::class => [
            Aquarius::class => .2,
            Aries::class => .6,
            Cancer::class => .9,
            Capricorn::class => .9,
            Gemini::class => .2,
            Leo::class => .5,
            Libra::class => .5,
            Pisces::class => .8,
            Sagittarius::class => .5,
            Scorpio::class => .9,
            Taurus::class => .9,
            Virgo::class => 1,
        ],
        Gemini::class => [
            Aquarius::class => 1,
            Aries::class => .8,
            Cancer::class => .5,
            Capricorn::class => .5,
            Gemini::class => .6,
            Leo::class => .8,
            Libra::class => .8,
            Pisces::class => .9,
            Sagittarius::class => .7,
            Scorpio::class => .1,
            Taurus::class => .5,
            Virgo::class => .7,
        ],
        Leo::class => [
            Aquarius::class => .9,
            Aries::class => .9,
            Cancer::class => .5,
            Capricorn::class => .2,
            Gemini::class => .8,
            Leo::class => .7,
            Libra::class => .8,
            Pisces::class => .7,
            Sagittarius::class => .5,
            Scorpio::class => .7,
            Taurus::class => .7,
            Virgo::class => .8,
        ],
        Libra::class => [
            Aquarius::class => .7,
            Aries::class => .9,
            Cancer::class => .5,
            Capricorn::class => .7,
            Gemini::class => .9,
            Leo::class => .8,
            Libra::class => .9,
            Pisces::class => .5,
            Sagittarius::class => .8,
            Scorpio::class => .5,
            Taurus::class => .5,
            Virgo::class => .7,
        ],
        Pisces::class => [
            Aquarius::class => .9,
            Aries::class => .5,
            Cancer::class => 1,
            Capricorn::class => .9,
            Gemini::class => .9,
            Leo::class => .5,
            Libra::class => .5,
            Pisces::class => .5,
            Sagittarius::class => .5,
            Scorpio::class => .8,
            Taurus::class => .6,
            Virgo::class => .8,
        ],
        Sagittarius::class => [
            Aquarius::class => .8,
            Aries::class => .8,
            Cancer::class => .5,
            Capricorn::class => .3,
            Gemini::class => .8,
            Leo::class => .7,
            Libra::class => .8,
            Pisces::class => .6,
            Sagittarius::class => .8,
            Scorpio::class => .1,
            Taurus::class => .5,
            Virgo::class => .7,
        ],
        Scorpio::class => [
            Aquarius::class => .6,
            Aries::class => .6,
            Cancer::class => .9,
            Capricorn::class => .9,
            Gemini::class => .3,
            Leo::class => .7,
            Libra::class => .5,
            Pisces::class => .8,
            Sagittarius::class => .3,
            Scorpio::class => 1,
            Taurus::class => .9,
            Virgo::class => .1,
        ],
        Taurus::class => [
            Aquarius::class => .6,
            Aries::class => .6,
            Cancer::class => .9,
            Capricorn::class => 1,
            Gemini::class => .5,
            Leo::class => .6,
            Libra::class => .6,
            Pisces::class => .6,
            Sagittarius::class => .4,
            Scorpio::class => .9,
            Taurus::class => .9,
            Virgo::class => .9,
        ],
        Virgo::class => [
            Aquarius::class => .7,
            Aries::class => .7,
            Cancer::class => .8,
            Capricorn::class => .9,
            Gemini::class => .8,
            Leo::class => .5,
            Libra::class => .6,
            Pisces::class => .9,
            Sagittarius::class => .7,
            Scorpio::class => .9,
            Taurus::class => .9,
            Virgo::class => .9,
        ],
    ];

    /**
     * Calculate zodiac sign compatibility between two signs
     */
    public function __invoke(SignInterface $a, SignInterface $b): float
    {
        if (!array_key_exists($a::class, $this->factors)) {
            throw new RuntimeException('Unable to match compatibility of ' . $a::class);
        }

        if (!array_key_exists($b::class, $this->factors[$a::class])) {
            throw new RuntimeException('Unable to match compatibility of ' . $b::class);
        }

        return $this->factors[$a::class][$b::class];
    }
}
