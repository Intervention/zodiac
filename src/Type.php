<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

enum Type
{
    case WESTERN;

    /**
     * Get all possible zodiac classname of current type
     *
     * @return array<string>
     */
    public function zodiacClassnames(): array
    {
        return match ($this) {
            self::WESTERN => [
                Zodiacs\Western\Aquarius::class,
                Zodiacs\Western\Aries::class,
                Zodiacs\Western\Cancer::class,
                Zodiacs\Western\Capricorn::class,
                Zodiacs\Western\Gemini::class,
                Zodiacs\Western\Leo::class,
                Zodiacs\Western\Libra::class,
                Zodiacs\Western\Pisces::class,
                Zodiacs\Western\Sagittarius::class,
                Zodiacs\Western\Scorpio::class,
                Zodiacs\Western\Taurus::class,
                Zodiacs\Western\Virgo::class,
            ],
        };
    }
}
