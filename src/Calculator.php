<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use DateTimeInterface;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;
use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Interfaces\SignInterface;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use Stringable;

class Calculator implements CalculatorInterface
{
    use Traits\HasTranslator;

    /**
     * Create new calculator instance with calender to calculate with
     */
    public function __construct(protected Astrology $astrology = Astrology::WESTERN)
    {
        //
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::create()
     */
    public static function create(Astrology $astrology = Astrology::WESTERN): self
    {
        return new self($astrology);
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::western()
     */
    public static function western(): self
    {
        return new self(Astrology::WESTERN);
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::chinese()
     */
    public static function chinese(): self
    {
        return new self(Astrology::CHINESE);
    }

    /**
     * {@inheritdoc}
     *
     * @see CalculatorInterface::calculate()
     *
     * @throws InvalidArgumentException
     * @throws RuntimeException
     */
    public function calculate(
        string|Stringable|int|float|DateTimeInterface $date,
        ?Astrology $astrology = null,
    ): SignInterface {
        $astrology = $astrology ?: $this->astrology;

        $sign = match (true) {
            is_string($date) && is_numeric($date) => Sign::fromUnix($date, $astrology),
            is_string($date) || $date instanceof Stringable => Sign::fromString($date, $astrology),
            is_int($date) || is_float($date) => Sign::fromUnix($date, $astrology),
            $date instanceof DateTimeInterface => Sign::fromDate($date, $astrology),
        };

        $sign->setTranslator($this->translator());

        return $sign;
    }
}
