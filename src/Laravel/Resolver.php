<?php

namespace Intervention\Zodiac\Laravel;

use Illuminate\Contracts\Foundation\Application
use Intervention\Zodiac\AbstractZodiac;
use Intervention\Zodiac\Calculator;

class Resolver
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function make($date): AbstractZodiac
    {
        return $this->getTranslatableCalculator()->getZodiac($date);
    }

    private function getTranslatableCalculator(): Calculator
    {
        return (new Calculator())->setTranslator($this->app['translator']);
    }
}
