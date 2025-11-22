<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Traits\CanTranslate;

abstract class AbstractSign implements SignInterface
{
    use CanTranslate;

    /**
     * Name of zodiac sign
     */
    protected string $name;

    /**
     * HTML representation of zodiac sign
     */
    protected string $html;

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::name()
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::html()
     */
    public function html(): string
    {
        return $this->html;
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::localized()
     */
    public function localize(?string $locale = null): SignInterface
    {
        $key = 'zodiacs::zodiacs.' . $this::class;

        if ($locale === null) {
            $locale = self::$translator ? self::$translator->locale() : 'en';
        }

        if (!$this->translator()->has($key, locale: $locale)) {
            return $this;
        }

        $translatedName = $this->translator()->get($key, locale: $locale);

        if (is_string($translatedName)) {
            $this->name = $translatedName;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::__toString()
     */
    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * Display debug info
     *
     * @return array<string>
     */
    public function __debugInfo(): array
    {
        return [
            'name' => $this->name(),
            'html' => $this->html(),
        ];
    }
}
