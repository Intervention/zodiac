<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use InvalidArgumentException;

abstract class AbstractZodiac
{
    use Traits\CanTranslate;

    /**
     * Create new zodiac instance
     *
     * @param int $startDay
     * @param int $startMonth
     * @param int $endDay
     * @param int $endMonth
     * @param string $name
     * @param string $html
     * @return void
     */
    public function __construct(
        protected int $startDay,
        protected int $startMonth,
        protected int $endDay,
        protected int $endMonth,
        protected string $name,
        protected string $html
    ) {
        //
    }

    /**
     * Determine if given date matches the current zodiac sign
     *
     * @param Carbon $date
     * @throws InvalidFormatException
     * @return bool
     */
    public function match(Carbon $date): bool
    {
        $start = Carbon::create(
            $date->year,
            $this->startMonth,
            $this->startDay
        );

        $end = Carbon::create(
            $date->year,
            $this->endMonth,
            $this->endDay,
            23,
            59,
            59
        );

        return $date->between($start, $end);
    }

    /**
     * Get localized name of zodiac sign
     *
     * @throws InvalidArgumentException
     * @return string
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
     * Get name of zodiac
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get HTML code of zodiac
     *
     * @return string
     */
    public function html(): string
    {
        return $this->html;
    }

    /**
     * Cast object to string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
