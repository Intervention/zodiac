<?php

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Illuminate\Translation\Translator;

abstract class AbstractZodiac
{
    /**
     * Name of zodiac sign
     *
     * @var string
     */
    public $name;

    /**
     * HTML code of zodiac sign
     *
     * @var string
     */
    public $html;

    /**
     * Start of zodiac sign
     *
     * @var array
     */
    public $start;

    /**
     * End of zodiac sign
     *
     * @var array
     */
    public $end;

    /**
     * Translator
     *
     * @var Translator
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
     * Determine if given date matches the current zodiac sign
     *
     * @param  Carbon $date
     * @return bool
     */
    public function match(Carbon $date): bool
    {
        $start = Carbon::create(
            $date->year,
            $this->start['month'],
            $this->start['day'],
            0,
            0,
            0
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
     * @return string
     */
    public function localized(): ?string
    {
        if (! is_a($this->translator, Translator::class)) {
            return "zodiacs.{$this->name}";
        }

        if ($this->translator->has("zodiacs.{$this->name}")) {
            // return error message from validation translation file
            return $this->translator->get("zodiacs.{$this->name}");
        }

        // return packages default message
        return $this->translator->get("zodiacs::zodiacs.{$this->name}");
    }

    /**
     * Get name of zodiac
     *
     * @return string
     */
    public function name(): ?string
    {
        return $this->name;
    }

    /**
     * Get HTML code of zodiac
     *
     * @return string
     */
    public function html(): ?string
    {
        return $this->html;
    }

    /**
     * Cast object to string
     *
     * @return string
     */
    public function __toString(): ?string
    {
        return $this->name;
    }
}
