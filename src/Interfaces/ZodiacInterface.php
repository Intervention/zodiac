<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Carbon\Carbon;

interface ZodiacInterface
{
    /**
     * Return the start date of the current zodiac sign
     *
     * @return Carbon
     */
    public function start(): Carbon;

    /**
     * Return the end date of the current zodiac sign
     *
     * @return Carbon
     */
    public function end(): Carbon;

    /**
     * Return the name of the current zodiac. This is more a identification key
     * than a textual title.
     *
     * @return string
     */
    public function name(): string;

    /**
     * Return the HTML UTF-8 symbol code representing an icon of the current zodiac sign.
     *
     * @return string
     */
    public function html(): string;

    /**
     * Return the localized title of the current zodiac in the given locale.
     * The locale parameter is optional, by default the english language is returned.
     *
     * @param null|string $locale
     * @return null|string
     */
    public function localized(?string $locale = null): ?string;

    /**
     * Calculate zodiac sign compatibility with any other sign in love & life
     * where 0 means no match and a maximum of 10 is a total match.
     *
     * Completely made up :) Don't plan your life around it.
     *
     * @param ZodiacInterface $zodiac
     * @return int
     */
    public function compatibility(self $zodiac): int;

    /**
     * Cast current object to string
     *
     * @return string
     */
    public function __toString(): string;
}
