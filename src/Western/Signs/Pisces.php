<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\PreConcreteWesternSign;

class Pisces extends PreConcreteWesternSign
{
    protected string $name = 'Pisces';
    protected string $html = '&#9811;';
    protected int $startDay = 20;
    protected int $startMonth = 2;
    protected int $endDay = 20;
    protected int $endMonth = 3;
}
