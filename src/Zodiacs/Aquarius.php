<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Aquarius extends AbstractZodiac
{
    public function __construct(
        protected int $startDay = 21,
        protected int $startMonth = 1,
        protected int $endDay = 19,
        protected int $endMonth = 2,
        protected string $name = 'aquarius',
        protected string $html = '&#9810;'
    ) {
        //
    }
}
