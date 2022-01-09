<?php

namespace Intervention\Zodiac\Laravel\Traits;

use Intervention\Zodiac\Calculator as ZodiacCalculator;
use Intervention\Zodiac\Exceptions\NotReadableException;

trait CanResolveZodiac
{
    protected $zodiacAttribute = 'birthday';

    public function getZodiacAttribute(): ?AbstractZodiac
    {
        $birthday = data_get($this->attributes, $this->zodiacAttribute);

        try {
            return ZodiacCalculator::make($birthday);
        } catch (NotReadableException $e) {
            return null;
        }
    }
}
