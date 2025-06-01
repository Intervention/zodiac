<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Carbon\Carbon;

interface ZodiacInterface
{
    /**
     * Return the start date of the current zodiac sign
     */
    public function start(): Carbon;

    /**
     * Return the end date of the current zodiac sign
     */
    public function end(): Carbon;

    /**
     * Return the name of the current zodiac. This is more a identification key
     * than a textual title.
     */
    public function name(): string;

    /**
     * Return the HTML UTF-8 symbol code representing an icon of the current zodiac sign.
     */
    public function html(): string;

    /**
     * Return the localized title of the current zodiac in the given locale.
     * The locale parameter is optional, by default the english language is returned.
     */
    public function localized(?string $locale = null): ?string;

    /**
     * Calculate zodiac sign compatibility with any other sign in love & life
     * where 0 means no match and a maximum of 10 is a total match.
     *
     * Completely made up :) Don't plan your life around it.
     */
    public function compatibility(self $zodiac): float;

    /**
     * Cast current object to string
     */
    public function __toString(): string;
}
