<?php

namespace Intervention\Zodiac\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

trait CanTranslate
{
    /**
     * Translator
     *
     * @var Translator
     */
    protected $translator;

    public function setTranslator($translator): self
    {
        $this->translator = $translator;

        return $this;
    }

    public function getTranslator(?string $locale = null): Translator
    {
        $locale = empty($locale) ? 'en' : $locale;

        if (is_a($this->translator, Translator::class)) {
            $translator = clone $this->translator;
            if ($translator->getLocale() !== $locale) {
                $translator->setLocale($locale);
            }
            return $translator;
        }

        $loader = new FileLoader(new Filesystem(), __DIR__ . '/../lang');
        $translator = new Translator($loader, $locale);

        return $translator;
    }
}
