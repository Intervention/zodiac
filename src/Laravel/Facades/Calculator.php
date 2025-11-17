<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel\Facades;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Support\Facades\Facade;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Interfaces\SignInterface;
use Stringable;

/**
 * @method static \Intervention\Zodiac\Calculator western()
 * @method static \Intervention\Zodiac\Calculator chinese()
 * @method static \Intervention\Zodiac\Calculator withAstrology(Astrology $astrology)
 * @method static \Intervention\Zodiac\Calculator fromString(string|Stringable $date, null|Astrology $astrology = null)
 * @method static \Intervention\Zodiac\Calculator fromDate(DateTimeInterface $date, null|Astrology $astrology = null)
 * @method static \Intervention\Zodiac\Calculator fromUnix(int|string $date, null|Astrology $astrology = null)
 * @method static \Intervention\Zodiac\Calculator fromCarbon(CarbonInterface $date, null|Astrology $astrology = null)
 * @method static \Intervention\Zodiac\Calculator compare(SignInterface $sign, SignInterface $with)
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
