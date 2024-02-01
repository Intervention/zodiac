<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use Illuminate\Support\Facades\Facade;

class ZodiacFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zodiac';
    }
}
