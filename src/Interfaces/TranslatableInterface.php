<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Illuminate\Translation\Translator;

interface TranslatableInterface
{
    /**
     * Get translator for given locale
     *
     * @param null|string $locale
     * @return Translator
     */
    public function translator(?string $locale = null): Translator;

    /**
     * Set translator on current object
     *
     * @param Translator $translator
     * @return CalculatorInterface|ZodiacInterface
     */
    public function setTranslator(Translator $translator): CalculatorInterface|ZodiacInterface;
}
