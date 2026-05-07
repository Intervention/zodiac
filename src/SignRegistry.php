<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

final class SignRegistry
{
    private static ?Translator $translator = null;

    /** @var array<string, string> */
    private static array $localizedNames = [];

    public static function setTranslator(?Translator $translator): void
    {
        self::$translator = $translator;
    }

    public static function getTranslator(?string $locale = null): Translator
    {
        if (self::$translator instanceof Translator) {
            return self::$translator;
        }

        $translator = new Translator(
            new FileLoader(new Filesystem(), __DIR__ . '/lang'),
            $locale ?: 'en',
        );

        $translator->addNamespace('zodiacs', __DIR__ . '/lang');

        return $translator;
    }

    public static function setLocalizedName(string $key, string $name): void
    {
        self::$localizedNames[$key] = $name;
    }

    public static function getLocalizedName(string $key, string $default): string
    {
        return self::$localizedNames[$key] ?? $default;
    }
}
