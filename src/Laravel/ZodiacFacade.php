<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Laravel;

use Illuminate\Support\Facades\Facade;

class ZodiacFacade extends Facade
{
    /**
     * @return string
     */
    // phpcs:ignore SlevomatCodingStandard.TypeHints.ReturnTypeHint
    protected static function getFacadeAccessor()
    {
        return 'zodiac';
    }
}
