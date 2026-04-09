<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use DateTimeInterface;
use Intervention\Zodiac\Astrology;
use Stringable;

interface SignInterface extends TranslatableInterface
{
    /**
     * Calculate zodiac from given date of type string.
     */
    public static function fromString(
        string|Stringable $date,
        Astrology $astrology = Astrology::WESTERN,
    ): self;

    /**
     * Calculate zodiac from given date object which implements DateTimeInterface.
     */
    public static function fromDate(
        DateTimeInterface $date,
        Astrology $astrology = Astrology::WESTERN,
    ): self;

    /**
     * Calculate zodiac from given unix timestamp date.
     */
    public static function fromUnix(
        string|int|float $date,
        Astrology $astrology = Astrology::WESTERN,
    ): self;

    /**
     * Return the title of the current zodiac
     */
    public function name(): string;

    /**
     * Return the HTML UTF-8 symbol code representing an icon of the current zodiac sign.
     */
    public function html(): string;

    /**
     * Return the time period in which the sign is located in the given year.
     */
    public function period(int $year): PeriodInterface;

    /**
     * Calculate zodiac sign compatibility with other sign in the same astrology
     * where 0 means no match and a maximum of 1 is total compatibility.
     */
    public function compatibility(self $sign): float;

    /**
     * Return the localized version of the current zodiac sign.
     */
    public function localize(?string $locale = null): self;
}
