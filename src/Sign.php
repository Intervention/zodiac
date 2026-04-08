<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Carbon\Exceptions\InvalidFormatException;
use DateTimeInterface;
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
     * @see SignInterface::fromCarbon()
     *
     * @throws RuntimeException
     */
    public static function fromCarbon(CarbonInterface $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        foreach ($astrology->signs() as $sign) {
            if (!($sign instanceof SignInterface)) {
                continue;
            }

            try {
                // check if the period of the zodiac sign matches the given date
                if ($sign->period($date->year)->contains($date)) {
                    return $sign->localize();
                }
            } catch (ZodiacException) {
                // try next sign
            }
        }

        throw new RuntimeException('Unable to calculate zodiac from CarbonInterface (' . (string) $date . ')');
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromString()
     *
     * @throws InvalidArgumentException
     */
    public static function fromString(string|Stringable $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        // normalize date
        $date = (string) $date;

        if ($date === '') { // empty string is allowed in Carbon::parse() but not here
            throw new InvalidArgumentException('Unable to create zodiac from empty string');
        }

        try {
            return self::fromCarbon(
                date: Carbon::parse($date),
                astrology: $astrology,
            );
        } catch (Throwable) {
            throw new InvalidArgumentException('Unable to create zodiac from string (' . $date . ')');
        }
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::fromDate()
     *
     * @throws RuntimeException
     */
    public static function fromDate(DateTimeInterface $date, Astrology $astrology = Astrology::WESTERN): SignInterface
    {
        try {
            return self::fromCarbon(
                date: new Carbon($date),
                astrology: $astrology,
            );
        } catch (InvalidFormatException $e) {
            throw new RuntimeException('Unable to create zodiac from DateTimeInterface', previous: $e);
        }
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
            throw new InvalidArgumentException('Unable to create zodiac from non-numeric unix timestamp');
        }

        try {
            return self::fromCarbon(
                date: Carbon::createFromTimestamp($date),
                astrology: $astrology,
            );
        } catch (Throwable) {
            throw new InvalidArgumentException('Unable to create zodiac from unix timestamp (' . $date . ')');
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
     * @see SignInterface::localized()
     *
     * @throws LocalizationException
     */
    public function localize(?string $locale = null): SignInterface
    {
        $key = 'zodiacs::zodiacs.' . $this::class;

        if ($locale === null) {
            $locale = self::$translator ? self::$translator->locale() : 'en';
        }

        if (!$this->translator()->has($key, locale: $locale)) {
            throw new LocalizationException('No translation for "' . $key . '" in locale "' . $locale . '"');
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
