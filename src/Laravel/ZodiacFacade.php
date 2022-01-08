<?php

namespace Intervention\Zodiac\Laravel;

use Illuminate\Support\Facades\Facade;

class ZodiacFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zodiac';
    }
}
