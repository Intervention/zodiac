<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Interfaces\ZodiacInterface;
use Intervention\Zodiac\CarbonExtension;
use Intervention\Zodiac\Interfaces\CalculatorInterface;
use InvalidArgumentException;
use ReflectionException;

class Calculator implements CalculatorInterface
{
    use Traits\CanTranslate;

    protected const ZODIAC_CLASSNAMES = [
        Zodiacs\Aquarius::class,
        Zodiacs\Aries::class,
        Zodiacs\Cancer::class,
        Zodiacs\Capricorn::class,
        Zodiacs\Gemini::class,
        Zodiacs\Leo::class,
        Zodiacs\Libra::class,
        Zodiacs\Pisces::class,
        Zodiacs\Sagittarius::class,
        Zodiacs\Scorpio::class,
        Zodiacs\Taurus::class,
        Zodiacs\Virgo::class,
    ];

    /**
     * Create new instance
     *
     * @return void
     * @throws ReflectionException
     */
    public function __construct()
    {
        Carbon::mixin(new CarbonExtension());
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::make()
     */
    public static function make(mixed $date): ZodiacInterface
    {
        return (new self())->zodiac($date);
    }

    /**
     * {@inheritdoc}
     *
     * @see ZodiacInterface::zodiac()
     */
    public function zodiac(mixed $date): ZodiacInterface
    {
        $date = $this->normalizeDate($date);
        foreach ($this::ZODIAC_CLASSNAMES as $classname) {
            $zodiac = new $classname();
            if ($date->isInterventionZodiac($zodiac)) {
                return $zodiac->setTranslator($this->translator());
            }
        }

        throw new NotReadableException(
            'Unable to create zodiac from value (' . $date . ')'
        );
    }

    /**
     * Normalze given date to Carbon object
     *
     * @param mixed $date
     * @throws InvalidArgumentException
     * @throws NotReadableException
     * @return Carbon
     */
    private function normalizeDate(mixed $date): Carbon
    {
        if (is_null($date)) {
            throw new NotReadableException(
                'Unable to create zodiac from NULL.'
            );
        }

        try {
            return Carbon::parse($date);
        } catch (InvalidFormatException) {
            throw new NotReadableException(
                'Unable to create zodiac from value (' . $date . ')'
            );
        }
    }
}
