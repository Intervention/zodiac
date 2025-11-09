<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Intervention\Zodiac\Interfaces\SignInterface;
use InvalidArgumentException;

trait CanTranslate
{
    /**
     * Translator
     */
    protected static ?Translator $translator = null;

    /**
     * {@inheritdoc}
     *
     * @see TranslatableInterface::setTranslator()
     */
    public function setTranslator(?Translator $translator): CalculatorInterface|SignInterface
    {
        static::$translator = $translator;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @see TranslatableInterface::translator()
     *
     * @throws InvalidArgumentException
     */
    public static function translator(?string $locale = null): Translator
    {
        if (static::$translator instanceof Translator) {
            return static::$translator;
        }

        return new Translator(
            new FileLoader(new Filesystem(), __DIR__ . '/../lang'),
            $locale ?: 'en'
        );
    }
}
