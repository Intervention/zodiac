<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Intervention\Zodiac\AbstractZodiac;
use Intervention\Zodiac\Calculator;
use InvalidArgumentException;

trait CanTranslate
{
    /**
     * Translator
     *
     * @var Translator
     */
    protected $translator;

    /**
     * Set translator
     *
     * @param Translator $translator
     * @return Calculator|AbstractZodiac
     */
    public function setTranslator(Translator $translator): Calculator|AbstractZodiac
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * Create translator
     *
     * @param null|string $locale
     * @throws InvalidArgumentException
     * @return Translator
     */
    public function getTranslator(?string $locale = null): Translator
    {
        if (is_a($this->translator, Translator::class)) {
            if (is_string($locale) && $this->translator->getLocale() !== $locale) {
                // switch translator to given locale
                $translator = clone $this->translator;
                $translator->setLocale($locale);

                return $translator;
            }

            return $this->translator;
        }

        $locale = empty($locale) ? 'en' : $locale;
        $loader = new FileLoader(new Filesystem(), __DIR__ . '/../lang');

        return new Translator($loader, $locale);
    }
}
