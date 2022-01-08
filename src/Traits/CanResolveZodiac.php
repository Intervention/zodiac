<?php

namespace Intervention\Zodiac\Traits;

use Zodiac;

trait CanResolveZodiac
{
    protected $zodiacAttribute = 'birthday';

    public function getZodiacAttribute(): ?AbstractZodiac
    {
        $birthday = data_get($this->attributes, $this->zodiacAttribute);

        try {
            return Zodiac::make($birthday);
        } catch (Exceptions\NotReadableException $e) {
            return null;
        }
    }
}
