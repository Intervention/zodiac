<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\PreConcreteWesternSign;

class Aquarius extends PreConcreteWesternSign
{
    protected string $name = 'Aquarius';
    protected string $html = '&#9810;';
    protected int $startDay = 21;
    protected int $startMonth = 1;
    protected int $endDay = 19;
    protected int $endMonth = 2;
}
