<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Aries extends AbstractSign
{
    protected string $name = 'Aries';
    protected string $html = '&#9800;';
    protected int $startDay = 21;
    protected int $startMonth = 3;
    protected int $endDay = 20;
    protected int $endMonth = 4;
}
