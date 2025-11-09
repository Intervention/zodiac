<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Signs\Western;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\Compatibility;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\TranslatableInterface;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Traits\CanTranslate;
use Stringable;

abstract class Sign implements SignInterface, TranslatableInterface, Stringable
{
    use CanTranslate;

    protected string $name;
    protected string $html;

    protected int $startDay;
    protected int $startMonth;
    protected ?int $startYear = null;

    protected int $endDay;
    protected int $endMonth;
    protected ?int $endYear = null;

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::start()
     *
     * @throcs InvalidFormatException
     * @throcs RuntimeException
     */
    public function start(): Carbon
    {
        $date = Carbon::create(
            month: $this->startMonth,
            day: $this->startDay,
            year: (int) $this->startYear
        );

        if ($date === null) {
            throw new RuntimeException('Unable to create end date of zodiac sign.');
        }

        return $date;
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::end()
     *
     * @throws InvalidFormatException
     * @throws RuntimeException
     */
    public function end(): Carbon
    {
        $date = Carbon::create(
            month: $this->endMonth,
            day: $this->endDay,
            year: (int) $this->endYear,
            hour: 23,
            minute: 59,
            second: 59
        );

        if ($date === null) {
            throw new RuntimeException('Unable to create end date of zodiac sign.');
        }

        return $date;
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
     * @see SignInterface::compatibility()
     */
    public function compatibility(SignInterface $zodiac): float
    {
        return call_user_func(new Compatibility(), $this, $zodiac);
    }

    /**
     * {@inheritdoc}
     *
     * @see SignInterface::localized()
     */
    public function localized(string $locale = 'en'): SignInterface
    {
        $key = 'zodiacs.' . $this::class;

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
}
