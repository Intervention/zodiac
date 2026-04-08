<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\Sign as WesternSign;

class Taurus extends WesternSign
{
    protected string $name = 'Taurus';
    protected string $html = '&#9801;';
    protected int $startDay = 21;
    protected int $startMonth = 4;
    protected int $endDay = 21;
    protected int $endMonth = 5;
}
