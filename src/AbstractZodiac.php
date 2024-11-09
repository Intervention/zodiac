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
     * Name of zodiac sign
     *
     * @var string
     */
    protected string $name;

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    protected string $html;

    /**
     * Start of zodiac sign
     *
     * @var array{month: int, day: int}
     */
    protected array $start;

    /**
     * End of zodiac sign
     *
     * @var array{month: int, day: int}
     */
    protected array $end;

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
            $this->start['month'],
            $this->start['day']
        );

        $end = Carbon::create(
            $date->year,
            $this->end['month'],
            $this->end['day'],
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
        $translator = $this->getTranslator($locale);
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
