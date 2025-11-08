<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\Zodiac;

class Leo extends Zodiac
{
    protected string $name = 'Leo';
    protected string $html = '&#9804;';
    protected int $startDay = 23;
    protected int $startMonth = 7;
    protected int $endDay = 23;
    protected int $endMonth = 8;
}
