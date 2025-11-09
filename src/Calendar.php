<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Intervention\Zodiac\Interfaces\SignInterface;

enum Calendar
{
    case WESTERN;
    case CHINESE;

    /**
     * Get all possible zodiac classname of current type
     *
     * @return array<string>
     */
    public function signClassnames(): array
    {
        return match ($this) {
            self::WESTERN => [
                Signs\Western\Aquarius::class,
                Signs\Western\Aries::class,
                Signs\Western\Cancer::class,
                Signs\Western\Capricorn::class,
                Signs\Western\Gemini::class,
                Signs\Western\Leo::class,
                Signs\Western\Libra::class,
                Signs\Western\Pisces::class,
                Signs\Western\Sagittarius::class,
                Signs\Western\Scorpio::class,
                Signs\Western\Taurus::class,
                Signs\Western\Virgo::class,
            ],
            self::CHINESE => [
                Signs\Chinese\Rat::class,
                Signs\Chinese\Ox::class,
                Signs\Chinese\Tiger::class,
                Signs\Chinese\Rabbit::class,
                Signs\Chinese\Dragon::class,
                Signs\Chinese\Snake::class,
                Signs\Chinese\Horse::class,
                Signs\Chinese\Goat::class,
                Signs\Chinese\Monkey::class,
                Signs\Chinese\Rooster::class,
                Signs\Chinese\Dog::class,
                Signs\Chinese\Pig::class,
            ],
        };
    }

    /**
     * @return array<SignInterface>
     */
    public function range(int $year): array
    {
        if ($this === self::CHINESE) {
            $lastYear = ChineseNewYearCalculator::newYear($year - 1);
            $newYear = ChineseNewYearCalculator::newYear($year);

            // @phpstan-ignore return.type
            return [
                $lastYear['classname']::create(
                    from: Carbon::create(...$lastYear['day']),
                    to: Carbon::create(...$newYear['day']),
                ),
                $newYear['classname']::create(
                    from: Carbon::create(...$newYear['day']),
                ),
            ];
        }

        return array_map(
            fn(string $classname): SignInterface => new $classname(), // @phpstan-ignore return.type
            $this->signClassnames()
        );
    }
}
