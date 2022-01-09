<?php

namespace Intervention\Zodiac\Laravel;

use Illuminate\Foundation\Application;
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
        return $this->getTranslatableCalculator($app)->getZodiac($date);
    }

    private function getTranslatableCalculator($app): Calculator
    {
        return (new Calculator())->setTranslator($this->app['translator']);
    }
}
