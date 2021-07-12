<?php

namespace Intervention\Zodiac;

use Zodiac;

trait EloquentZodiacTrait
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
