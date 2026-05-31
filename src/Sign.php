<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\LocalizationException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Exceptions\ZodiacException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Traits\HasTranslator;
use Stringable;
use Throwable;

abstract class Sign implements SignInterface
{
    use HasTranslator;

    /**
     * Name of zodiac sign.
     */
    protected string $name;

    /**
     * HTML representation of zodiac sign.
     */
    protected string $html;

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromDate()
     *
     * @throws RuntimeException
     */
    public static function fromDate(DateTimeInterface $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        $date = DateTimeImmutable::createFromInterface($date);

        foreach ($astrology->signs() as $sign) {
            if (!($sign instanceof SignInterface)) {
                continue;
            }

            try {
                // check if the period of the zodiac sign matches the given date
                if ($sign->period((int) $date->format('Y'))->contains($date)) {
                    return $sign->localize();
                }
            } catch (ZodiacException) {
                // try next sign
            }
        }

        throw new RuntimeException('No matching zodiac sign for date "' . $date->format('Y-m-d H:i:s') . '"');
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromString()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        // normalize date
        $date = (string) $date;

        if ($date === '') {
            throw new InvalidArgumentException('Unable to create zodiac from empty string');
        }

        try {
            $date = new DateTimeImmutable($date);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Unable to create zodiac from string "' . $date . '"', previous: $e);
        }

        return self::fromDate(date: $date, astrology: $astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromUnix()
     *
     * @throws InvalidArgumentException
     */
    public static function fromUnix(string|int|float $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        if (!is_numeric($date)) {
            throw new InvalidArgumentException(
                'Unable to create zodiac from non-numeric unix timestamp "' . $date . '"',
            );
        }

        try {
            return self::fromDate(
                date: (new DateTimeImmutable())->setTimestamp((int) $date),
                astrology: $astrology,
            );
        } catch (Throwable $e) {
            throw new InvalidArgumentException(
                'Unable to create zodiac from unix timestamp "' . $date . '"',
                previous: $e,
            );
        }
    }

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
     * @see SignInterface::localize()
     *
     * @throws LocalizationException
     */
    public function localize(?string $locale = null): SignInterface
    {
        $key = 'zodiacs::zodiacs.' . $this::class;

        if ($locale === null) {
            $locale = self::$translator !== null ? self::$translator->locale() : 'en';
        }

        if (!self::translator()->has($key, locale: $locale)) {
            throw new LocalizationException('No translation for "' . $key . '" in locale "' . $locale . '"');
        }

        $translatedName = self::translator()->get($key, locale: $locale);

        if (!is_string($translatedName)) {
            throw new LocalizationException('No translation for "' . $key . '" in locale "' . $locale . '"');
        }

        $this->name = $translatedName;

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
     * Display debug info.
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
