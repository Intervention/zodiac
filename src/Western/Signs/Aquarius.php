<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Aquarius extends AbstractSign
{
    protected string $name = 'Aquarius';
    protected string $html = '&#9810;';
    protected int $startDay = 21;
    protected int $startMonth = 1;
    protected int $endDay = 19;
    protected int $endMonth = 2;
}
