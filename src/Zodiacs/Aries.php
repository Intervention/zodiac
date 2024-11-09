<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Aries extends AbstractZodiac
{
    public function __construct(
        protected int $startDay = 21,
        protected int $startMonth = 3,
        protected int $endDay = 20,
        protected int $endMonth = 4,
        protected string $name = 'aries',
        protected string $html = '&#9800;'
    ) {
        //
    }
}
