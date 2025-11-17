<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Intervention\Zodiac\Calculator western()
 * @method static \Intervention\Zodiac\Calculator chinese()
 * @method static \Intervention\Zodiac\Calculator withAstrology(Intervention\Zodiac\Astrology $astrology)
 * @method static \Intervention\Zodiac\Calculator fromString(string|Stringable $date, null|Intervention\Zodiac\Astrology = null)
 * @method static \Intervention\Zodiac\Calculator fromDate(DateTimeInterface $date, null|Intervention\Zodiac\Astrology = null)
 * @method static \Intervention\Zodiac\Calculator fromUnix(int|string $date, null|Intervention\Zodiac\Astrology = null)
 * @method static \Intervention\Zodiac\Calculator fromCarbon(Carbon\CarbonInterface $date, null|Intervention\Zodiac\Astrology = null)
 * @method static \Intervention\Zodiac\Calculator compare(Intervention\Zodiac\Interfaces\SignInterface $sign, Intervention\Zodiac\Interfaces\SignInterface $with)
 */
class Calculator extends Facade
{
    /**
     * @return string
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint
    protected static function getFacadeAccessor()
    {
        return 'zodiac';
    }
}
