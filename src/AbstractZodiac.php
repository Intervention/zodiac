<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Intervention\Zodiac\Interfaces\ZodiacInterface;

abstract class AbstractZodiac implements ZodiacInterface
{
    use Traits\CanTranslate;

    protected int $startDay;
    protected int $startMonth;
    protected int $endDay;
    protected int $endMonth;
    protected string $name;
    protected string $html;

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::start()
     */
    public function start(): Carbon
    {
        return Carbon::create(
            month: $this->startMonth,
            day: $this->startDay
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::end()
     */
    public function end(): Carbon
    {
        return Carbon::create(
            month: $this->endMonth,
            day: $this->endDay,
            hour: 23,
            minute: 59,
            second: 59
        );
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::localized()
     */
    public function localized(?string $locale = null): ?string
    {
        $translator = $this->translator($locale);
        $key = "zodiacs.{$this->name}";

        if ($translator->has($key)) {
            return $translator->get($key);
        }

        // return packages default message
        return $translator->get("zodiacs::{$key}");
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::name()
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::html()
     */
    public function html(): string
    {
        return $this->html;
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::__toString()
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
