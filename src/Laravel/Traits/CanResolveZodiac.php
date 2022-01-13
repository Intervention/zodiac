<?php

namespace Intervention\Zodiac\Laravel\Traits;

use Intervention\Zodiac\AbstractZodiac;
use Intervention\Zodiac\Calculator as ZodiacCalculator;
use Intervention\Zodiac\Exceptions\NotReadableException;
use Intervention\Zodiac\Laravel\ZodiacFacade;

trait CanResolveZodiac
{
    protected $birthdayAttribute = 'birthday';

    public function getZodiacAttribute(): ?AbstractZodiac
    {
        $birthday = data_get($this->attributes, $this->birthdayAttribute);

        try {
            return ZodiacFacade::make($birthday);
        } catch (NotReadableException $e) {
            return null;
        }
    }
}
