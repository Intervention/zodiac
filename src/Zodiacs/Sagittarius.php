<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Sagittarius extends AbstractZodiac
{
    public function __construct(
        protected int $startDay = 23,
        protected int $startMonth = 11,
        protected int $endDay = 21,
        protected int $endMonth = 12,
        protected string $name = 'sagittarius',
        protected string $html = '&#9808;'
    ) {
        //
    }
}
