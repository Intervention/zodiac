<?php

namespace Intervention\Zodiac;

use Illuminate\Translation\Translator;
use Carbon\Carbon;

class Calculator
{
    /**
     * Date
     *
     * @var Carbon\Carbon
     */
    public $date;

    /**
     * Translator
     *
     * @var Illuminate\Translation\Translator
     */
    public $translator;

    /**
     * Construct object
     *
     * @param Translator $translator
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
        switch (true) {
            case is_string($date):
                $this->date = Carbon::parse($date);
                break;

            case is_int($date):
                $this->date = Carbon::createFromTimestamp($date);
                break;

            case is_a($date, 'DateTime'):
                $this->date = Carbon::instance($date);
                break;
            
            default:
                throw new Exceptions\NotReadableException(
                    "Unable to read date ({$date})"
                );
        }

        return $this;
    }

    /**
     * Key zodiac name for given date
     *
     * @param  mixed $date
     * @return AbstractZodiac
     */
    public function make($date): AbstractZodiac
    {
        $this->setDate($date);

        foreach ($this->getZodiacClassnames() as $classname) {
            $zodiac = new $classname($this->translator);
            if ($zodiac->match($this->date)) {
                return $zodiac;
            }
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
