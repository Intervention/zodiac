<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\PreConcreteWesternSign;

class Libra extends PreConcreteWesternSign
{
    protected string $name = 'Libra';
    protected string $html = '&#9806;';
    protected int $startDay = 24;
    protected int $startMonth = 9;
    protected int $endDay = 23;
    protected int $endMonth = 10;
}
