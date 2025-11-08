<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

enum Calendar
{
    case WESTERN;
    case CHINESE;

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
            self::CHINESE => [
                Zodiacs\Chinese\Rat::class,
                Zodiacs\Chinese\Ox::class,
                Zodiacs\Chinese\Tiger::class,
                Zodiacs\Chinese\Rabbit::class,
                Zodiacs\Chinese\Dragon::class,
                Zodiacs\Chinese\Snake::class,
                Zodiacs\Chinese\Horse::class,
                Zodiacs\Chinese\Goat::class,
                Zodiacs\Chinese\Monkey::class,
                Zodiacs\Chinese\Rooster::class,
                Zodiacs\Chinese\Dog::class,
                Zodiacs\Chinese\Pig::class,
            ],
        };
    }

    /**
     * @return array<string>
     */
    public function range(int $year): array
    {
        if ($this === self::WESTERN) {
            return $this->zodiacClassnames();
        }

        // $table = [
        //     2000 => [
        //         Dragon::class => [1, 1],
        //         Snake::class => [1, 29],
        //     ],
        // ];

        // $range = [];

        // foreach (range(1, 12) as $month) {
        //     $range[$month] = $month;
        // }

        return [];
    }
}
