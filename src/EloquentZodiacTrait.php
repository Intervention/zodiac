<?php

namespace Intervention\Zodiac;

use Zodiac;

trait EloquentZodiacTrait
{
    public function getZodiacAttribute()
    {
        $birthday = data_get($this->attributes, 'birthday');

        try {
            return Zodiac::make($birthday);
        } catch (Exceptions\NotReadableException $e) {
            return null;
        }
    }
}
