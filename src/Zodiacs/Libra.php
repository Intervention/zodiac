<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Libra extends AbstractZodiac
{
    protected int $startDay = 24;
    protected int $startMonth = 9;
    protected int $endDay = 23;
    protected int $endMonth = 10;
    protected string $name = 'libra';
    protected string $html = '&#9806;';
}
