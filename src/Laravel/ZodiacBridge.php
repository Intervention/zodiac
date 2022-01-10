<?php

namespace Intervention\Zodiac\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Intervention\Zodiac\AbstractZodiac;
use Intervention\Zodiac\Calculator;

class ZodiacBridge
{
    /**
     * Laravel Application
     *
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Make zodiac from input date
     *
     * @param  mixed $date
     * @return AbstractZodiac
     */
    public function make($date): AbstractZodiac
    {
        return $this->getTranslatableCalculator()->getZodiac($date);
    }

    /**
     * Return calculator with Laravel Translator
     *
     * @return Calculator
     */
    private function getTranslatableCalculator(): Calculator
    {
        return (new Calculator())->setTranslator($this->app['translator']);
    }
}
