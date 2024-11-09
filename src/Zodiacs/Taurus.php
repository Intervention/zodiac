<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Taurus extends AbstractZodiac
{
    public function __construct(
        protected int $startDay = 21,
        protected int $startMonth = 4,
        protected int $endDay = 21,
        protected int $endMonth = 5,
        protected string $name = 'taurus',
        protected string $html = '&#9801;'
    ) {
        //
    }
}
