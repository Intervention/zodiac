<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Generator;

enum Astrology
{
    case WESTERN;
    case CHINESE;

    /**
     * Get all possible zodiac classname of current astrology type
     *
     * @return array<string>
     */
    public function signClassnames(): array
    {
        return match ($this) {
            self::WESTERN => [
                Western\Signs\Aquarius::class,
                Western\Signs\Aries::class,
                Western\Signs\Cancer::class,
                Western\Signs\Capricorn::class,
                Western\Signs\Gemini::class,
                Western\Signs\Leo::class,
                Western\Signs\Libra::class,
                Western\Signs\Pisces::class,
                Western\Signs\Sagittarius::class,
                Western\Signs\Scorpio::class,
                Western\Signs\Taurus::class,
                Western\Signs\Virgo::class,
            ],
            self::CHINESE => [
                Chinese\Signs\Rat::class,
                Chinese\Signs\Ox::class,
                Chinese\Signs\Tiger::class,
                Chinese\Signs\Rabbit::class,
                Chinese\Signs\Dragon::class,
                Chinese\Signs\Snake::class,
                Chinese\Signs\Horse::class,
                Chinese\Signs\Goat::class,
                Chinese\Signs\Monkey::class,
                Chinese\Signs\Rooster::class,
                Chinese\Signs\Dog::class,
                Chinese\Signs\Pig::class,
            ],
        };
    }

    /**
     * Yield all possible sign instances of the current astrology
     */
    public function signs(): Generator
    {
        foreach ($this->signClassnames() as $classname) {
            yield new $classname();
        }
    }
}
