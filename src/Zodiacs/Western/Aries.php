<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs\Western;

use Intervention\Zodiac\Zodiac;

class Aries extends Zodiac
{
    protected string $name = 'Aries';
    protected string $html = '&#9800;';
    protected int $startDay = 21;
    protected int $startMonth = 3;
    protected int $endDay = 20;
    protected int $endMonth = 4;
}
