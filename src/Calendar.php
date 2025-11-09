<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Intervention\Zodiac\Interfaces\ZodiacInterface;

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
     * @return array<ZodiacInterface>
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
            fn(string $classname): ZodiacInterface => new $classname(), // @phpstan-ignore return.type
            $this->signClassnames()
        );
    }
}
