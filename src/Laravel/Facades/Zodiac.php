<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel\Facades;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Support\Facades\Facade;
use Intervention\Zodiac\Astrology;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Intervention\Zodiac\Interfaces\SignInterface;
use Stringable;

/**
 * @method static CalculatorInterface western()
 * @method static CalculatorInterface chinese()
 * @method static CalculatorInterface withAstrology(Astrology $astrology)
 * @method static SignInterface fromString(string|Stringable $date, null|Astrology $astrology = null)
 * @method static SignInterface fromDate(DateTimeInterface $date, null|Astrology $astrology = null)
 * @method static SignInterface fromUnix(int|string $date, null|Astrology $astrology = null)
 * @method static SignInterface fromCarbon(CarbonInterface $date, null|Astrology $astrology = null)
 * @method static float compare(SignInterface $sign, SignInterface $with)
 */
class Zodiac extends Facade
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
