<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Illuminate\Translation\Translator;

interface TranslatableInterface
{
    /**
     * Get translator for given locale
     */
    public static function translator(?string $locale = null): Translator;

    /**
     * Set translator on current object
     */
    public function setTranslator(?Translator $translator): CalculatorInterface|SignInterface;
}
