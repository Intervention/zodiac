<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Scorpio extends AbstractZodiac
{
    public function __construct(
        protected int $startDay = 24,
        protected int $startMonth = 10,
        protected int $endDay = 22,
        protected int $endMonth = 11,
        protected string $name = 'scorpio',
        protected string $html = '&#9807;'
    ) {
        //
    }
}
