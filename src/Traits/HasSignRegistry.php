<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Traits;

use DateTimeImmutable;
use Illuminate\Translation\Translator;
use Intervention\Zodiac\Exceptions\LocalizationException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Exceptions\ZodiacException;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\SignRegistry;

trait HasSignRegistry
{
    public function name(): string
    {
        return SignRegistry::getLocalizedName($this->value, $this->value);
    }

    public static function translator(?string $locale = null): Translator
    {
        return SignRegistry::getTranslator($locale);
    }

    public function setTranslator(?Translator $translator): CalculatorInterface|SignInterface
    {
        SignRegistry::setTranslator($translator);

        return $this;
    }

    /**
     * @throws LocalizationException
     */
    public function localize(?string $locale = null): self
    {
        $translator = SignRegistry::getTranslator($locale);
        $locale ??= $translator->locale();
        $key = 'zodiacs::zodiacs.' . $this->value;

        if (!$translator->has($key, $locale)) {
            throw new LocalizationException('No translation for "' . $key . '" in locale "' . $locale . '"');
        }

        $translated = $translator->get($key, [], $locale);

        if (is_string($translated)) {
            SignRegistry::setLocalizedName($this->value, $translated);
        }

        return $this;
    }

    /**
     * Iterate all cases to find the one whose period contains the given date.
     *
     * @throws RuntimeException
     */
    protected static function findByDate(DateTimeImmutable $date): self
    {
        foreach (self::cases() as $sign) {
            try {
                if ($sign->period((int) $date->format('Y'))->contains($date)) {
                    return $sign->localize();
                }
            } catch (ZodiacException) {
                // try next sign
            }
        }

        throw new RuntimeException('No matching zodiac sign for date "' . $date->format('Y-m-d H:i:s') . '"');
    }
}
