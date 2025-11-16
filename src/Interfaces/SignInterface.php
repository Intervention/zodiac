<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Stringable;

interface SignInterface extends Stringable
{
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
     * Calculate zodiac sign compatibility with any other sign in love & life
     * where 0 means no match and a maximum of 10 is a total match.
     *
     * Completely made up :) Don't plan your life around it.
     */
    public function compatibility(self $sign): float;

     /**
     * Return the localized version of the current zodiac sign
     */
    public function localize(string $locale = 'en'): self;

    /**
     * Cast current object to string
     */
    public function __toString(): string;
}
