<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Virgo extends AbstractSign
{
    protected string $name = 'Virgo';
    protected string $html = '&#9805;';
    protected int $startDay = 24;
    protected int $startMonth = 8;
    protected int $endDay = 23;
    protected int $endMonth = 9;
}
