<?php

namespace Intervention\Zodiac;

trait EloquentZodiacTrait
{
    public function getZodiacAttribute()
    {
        $birthday = data_get($this->attributes, 'birthday');
        $calculator = new Calculator(app('translator'));

        try {
            
            return $calculator->make($birthday);    

        } catch (Exceptions\NotReadableException $e) {
            return null;
        }
    }
}