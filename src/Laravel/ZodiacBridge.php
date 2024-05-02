<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use Illuminate\Contracts\Foundation\Application;
use Intervention\Zodiac\AbstractZodiac;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Exceptions\NotReadableException;
use InvalidArgumentException;

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
     * @param mixed $date
     * @throws NotReadableException
     * @throws InvalidArgumentException
     * @return AbstractZodiac
     */
    public function make($date): AbstractZodiac
    {
        return $this->getTranslatableCalculator()->getZodiac($date);
    }

    /**
     * Return calculator with Laravel Translator
     *
     * @throws InvalidArgumentException
     * @return Calculator
     */
    private function getTranslatableCalculator(): Calculator
    {
        return (new Calculator())->setTranslator($this->app['translator']);
    }
}
