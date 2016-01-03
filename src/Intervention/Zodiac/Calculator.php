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
    function __construct(Translator $translator = null)
    {
        $this->translator = $translator;
    }

    /**
     * Reads mixed date into Carbon object
     *
     * @param mixed $date
     */
    public function setDate($date)
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
     * @return string
     */
    public function make($date)
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
    private function getZodiacClassnames()
    {
        return [
            "Intervention\Zodiac\Zodiacs\Aquarius",
            "Intervention\Zodiac\Zodiacs\Aries",
            "Intervention\Zodiac\Zodiacs\Cancer",
            "Intervention\Zodiac\Zodiacs\Capricorn",
            "Intervention\Zodiac\Zodiacs\Gemini",
            "Intervention\Zodiac\Zodiacs\Leo",
            "Intervention\Zodiac\Zodiacs\Libra",
            "Intervention\Zodiac\Zodiacs\Pisces",
            "Intervention\Zodiac\Zodiacs\Sagittarius",
            "Intervention\Zodiac\Zodiacs\Scorpio",
            "Intervention\Zodiac\Zodiacs\Taurus",
            "Intervention\Zodiac\Zodiacs\Virgo",
        ];
    }
}
