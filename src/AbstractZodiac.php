<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\TranslatableInterface;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use InvalidArgumentException;

abstract class AbstractZodiac implements ZodiacInterface, TranslatableInterface
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
     * @throws InvalidFormatException
     * @throws RuntimeException
     */
    public function start(): Carbon
    {
        $date = Carbon::create(
            month: $this->startMonth,
            day: $this->startDay
        );

        if ($date == false) {
            throw new RuntimeException('Unable to create end date of zodiac sign.');
        }

        return $date;
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::end()
     * @throws InvalidFormatException
     * @throws RuntimeException
     */
    public function end(): Carbon
    {
        $date = Carbon::create(
            month: $this->endMonth,
            day: $this->endDay,
            hour: 23,
            minute: 59,
            second: 59
        );

        if ($date == false) {
            throw new RuntimeException('Unable to create end date of zodiac sign.');
        }

        return $date;
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::localized()
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function localized(?string $locale = null): ?string
    {
        $translator = $this->translator($locale);
        $key = "zodiacs.{$this->name}";

        $translated = match ($translator->has($key)) {
            true => $translator->get($key),
            false => $translator->get("zodiacs::{$key}"),
        };

        if (is_array($translated)) {
            throw new RuntimeException(
                'Unable to get translated name from array, should be string.'
            );
        }

        return $translated;
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
     * @see ZodiacInterface::compatibility()
     */
    public function compatibility(ZodiacInterface $zodiac): float
    {
        return call_user_func(new Compatibility(), $this, $zodiac);
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
