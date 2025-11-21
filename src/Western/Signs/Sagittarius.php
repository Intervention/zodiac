<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Sagittarius extends AbstractSign
{
    protected string $name = 'Sagittarius';
    protected string $html = '&#9808;';
    protected int $startDay = 23;
    protected int $startMonth = 11;
    protected int $endDay = 21;
    protected int $endMonth = 12;
}
