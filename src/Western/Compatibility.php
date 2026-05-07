<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western;

use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;

class Compatibility
{
    /**
     * @var array<string, array<string, float>> $factors
     */
    protected array $factors = [
        'Aquarius' => [
            'Aquarius'    => .9,
            'Aries'       => .9,
            'Cancer'      => .2,
            'Capricorn'   => .3,
            'Gemini'      => 1,
            'Leo'         => .8,
            'Libra'       => .7,
            'Pisces'      => .6,
            'Sagittarius' => .8,
            'Scorpio'     => .1,
            'Taurus'      => .5,
            'Virgo'       => .7,
        ],
        'Aries' => [
            'Aquarius'    => .9,
            'Aries'       => 1,
            'Cancer'      => .7,
            'Capricorn'   => .5,
            'Gemini'      => .9,
            'Leo'         => .9,
            'Libra'       => .9,
            'Pisces'      => .7,
            'Sagittarius' => 1,
            'Scorpio'     => .6,
            'Taurus'      => .6,
            'Virgo'       => .7,
        ],
        'Cancer' => [
            'Aquarius'    => .2,
            'Aries'       => .7,
            'Cancer'      => 1,
            'Capricorn'   => .8,
            'Gemini'      => .6,
            'Leo'         => .8,
            'Libra'       => .7,
            'Pisces'      => 1,
            'Sagittarius' => .5,
            'Scorpio'     => .8,
            'Taurus'      => .9,
            'Virgo'       => .8,
        ],
        'Capricorn' => [
            'Aquarius'    => .2,
            'Aries'       => .6,
            'Cancer'      => .9,
            'Capricorn'   => .9,
            'Gemini'      => .2,
            'Leo'         => .5,
            'Libra'       => .5,
            'Pisces'      => .8,
            'Sagittarius' => .5,
            'Scorpio'     => .9,
            'Taurus'      => .9,
            'Virgo'       => 1,
        ],
        'Gemini' => [
            'Aquarius'    => 1,
            'Aries'       => .8,
            'Cancer'      => .5,
            'Capricorn'   => .5,
            'Gemini'      => .6,
            'Leo'         => .8,
            'Libra'       => .8,
            'Pisces'      => .9,
            'Sagittarius' => .7,
            'Scorpio'     => .1,
            'Taurus'      => .5,
            'Virgo'       => .7,
        ],
        'Leo' => [
            'Aquarius'    => .9,
            'Aries'       => .9,
            'Cancer'      => .5,
            'Capricorn'   => .2,
            'Gemini'      => .8,
            'Leo'         => .7,
            'Libra'       => .8,
            'Pisces'      => .7,
            'Sagittarius' => .5,
            'Scorpio'     => .7,
            'Taurus'      => .7,
            'Virgo'       => .8,
        ],
        'Libra' => [
            'Aquarius'    => .7,
            'Aries'       => .9,
            'Cancer'      => .5,
            'Capricorn'   => .7,
            'Gemini'      => .9,
            'Leo'         => .8,
            'Libra'       => .9,
            'Pisces'      => .5,
            'Sagittarius' => .8,
            'Scorpio'     => .5,
            'Taurus'      => .5,
            'Virgo'       => .7,
        ],
        'Pisces' => [
            'Aquarius'    => .9,
            'Aries'       => .5,
            'Cancer'      => 1,
            'Capricorn'   => .9,
            'Gemini'      => .9,
            'Leo'         => .5,
            'Libra'       => .5,
            'Pisces'      => .5,
            'Sagittarius' => .5,
            'Scorpio'     => .8,
            'Taurus'      => .6,
            'Virgo'       => .8,
        ],
        'Sagittarius' => [
            'Aquarius'    => .8,
            'Aries'       => .8,
            'Cancer'      => .5,
            'Capricorn'   => .3,
            'Gemini'      => .8,
            'Leo'         => .7,
            'Libra'       => .8,
            'Pisces'      => .6,
            'Sagittarius' => .8,
            'Scorpio'     => .1,
            'Taurus'      => .5,
            'Virgo'       => .7,
        ],
        'Scorpio' => [
            'Aquarius'    => .6,
            'Aries'       => .6,
            'Cancer'      => .9,
            'Capricorn'   => .9,
            'Gemini'      => .3,
            'Leo'         => .7,
            'Libra'       => .5,
            'Pisces'      => .8,
            'Sagittarius' => .3,
            'Scorpio'     => 1,
            'Taurus'      => .9,
            'Virgo'       => .1,
        ],
        'Taurus' => [
            'Aquarius'    => .6,
            'Aries'       => .6,
            'Cancer'      => .9,
            'Capricorn'   => 1,
            'Gemini'      => .5,
            'Leo'         => .6,
            'Libra'       => .6,
            'Pisces'      => .6,
            'Sagittarius' => .4,
            'Scorpio'     => .9,
            'Taurus'      => .9,
            'Virgo'       => .9,
        ],
        'Virgo' => [
            'Aquarius'    => .7,
            'Aries'       => .7,
            'Cancer'      => .8,
            'Capricorn'   => .9,
            'Gemini'      => .8,
            'Leo'         => .5,
            'Libra'       => .6,
            'Pisces'      => .9,
            'Sagittarius' => .7,
            'Scorpio'     => .9,
            'Taurus'      => .9,
            'Virgo'       => .9,
        ],
    ];

    /**
     * Calculate zodiac sign compatibility between two signs.
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function __invoke(SignInterface $a, SignInterface $b): float
    {
        if ($a::class !== $b::class) {
            throw new InvalidArgumentException('The signs being compared must have the same astrology');
        }

        $keyA = $this->signKey($a);
        $keyB = $this->signKey($b);

        if (!array_key_exists($keyA, $this->factors)) {
            throw new RuntimeException('Unable to match compatibility of ' . $keyA . ' with ' . $keyB);
        }

        if (!array_key_exists($keyB, $this->factors[$keyA])) {
            throw new RuntimeException('Unable to match compatibility of ' . $keyA . ' with ' . $keyB);
        }

        return $this->factors[$keyA][$keyB];
    }

    protected function signKey(SignInterface $sign): string
    {
        return $sign instanceof \UnitEnum ? $sign->name : $sign::class;
    }
}
