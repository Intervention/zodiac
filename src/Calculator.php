<?php

namespace Intervention\Zodiac;

use Illuminate\Translation\Translator;
use Carbon\Carbon;
use Exception;

class Calculator
{
    /**
     * Date
     *
     * @var Carbon
     */
    public $date;

    /**
     * Translator
     *
     * @var Translator|null
     */
    public $translator;

    /**
     * Construct object
     *
     * @param Translator|null $translator
     */
    public function __construct(Translator $translator = null)
    {
        $this->translator = $translator;
    }

    /**
     * Reads mixed date into Carbon object
     *
     * @param mixed $date
     * @return Calculator
     */
    public function setDate($date): Calculator
    {
        try {
            $this->date = DateParser::parse($date);
        } catch (Exception $e) {
            throw new Exceptions\NotReadableException(
                "Unable to parse date ({$date})"
            );
        }

        return $this;
    }

    /**
     * Get zodiac for given date
     *
     * @param  mixed $date
     * @return AbstractZodiac
     */
    public function make($date): AbstractZodiac
    {
        return $this->setDate($date)->getZodiac();
    }

    /**
     * Find zodiac by current date
     *
     * @return AbstractZodiac
     */
    public function getZodiac(): AbstractZodiac
    {
        if (false === $this->hasDate()) {
            throw new Exceptions\NotReadableException(
                'Unable to create zodiac from empty date (call setDate() first)'
            );
        }

        foreach ($this->getZodiacClassnames() as $classname) {
            $zodiac = new $classname($this->translator);
            if ($zodiac->match($this->date)) {
                return $zodiac;
            }
        }

        throw new Exceptions\NotReadableException(
            'Unable to create zodiac from value (' . $this->date . ')'
        );
    }

    /**
     * Determine if current instance has date set
     *
     * @return boolean
     */
    private function hasDate(): bool
    {
        return $this->date instanceof Carbon;
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
