<?php

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;

class Calculator
{
    use Traits\CanTranslate;

    /**
     * Get zodiac for given date
     *
     * @param  mixed $date
     * @return AbstractZodiac
     */
    public static function make($date): AbstractZodiac
    {
        return (new self())->getZodiac($date);
    }

    /**
     * Get zodiac for given date
     *
     * @param  mixed $date
     * @return AbstractZodiac
     */
    public function getZodiac($date): AbstractZodiac
    {
        $date = $this->normalizeDate($date);
        foreach ($this->getZodiacClassnames() as $classname) {
            $zodiac = new $classname();
            if ($zodiac->match($date)) {
                return $zodiac->setTranslator($this->getTranslator());
            }
        }

        throw new Exceptions\NotReadableException(
            'Unable to create zodiac from value (' . $date . ')'
        );
    }

    protected function normalizeDate($date): Carbon
    {
        try {
            return Carbon::parse($date);
        } catch (InvalidFormatException $e) {
            throw new Exceptions\NotReadableException(
                'Unable to create zodiac from value (' . $date . ')'
            );
        }
    }

    /**
     * Returns array of all zodiac classnames
     *
     * @return array
     */
    private function getZodiacClassnames(): array
    {
        return [
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
    }
}
