<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Carbon\Carbon;

interface SignInterface
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
     * Return the start date of the current zodiac sign
     */
    public function start(): Carbon;

    /**
     * Return the end date of the current zodiac sign
     */
    public function end(): Carbon;

    /**
     * Calculate zodiac sign compatibility with any other sign in love & life
     * where 0 means no match and a maximum of 10 is a total match.
     *
     * Completely made up :) Don't plan your life around it.
     */
    public function compatibility(self $zodiac): float;

     /**
     * Return the localized version of the current zodiac sign
     */
    public function localized(string $locale = 'en'): self;

    /**
     * Cast current object to string
     */
    public function __toString(): string;
}
