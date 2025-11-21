<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Cancer extends AbstractSign
{
    protected string $name = 'Cancer';
    protected string $html = '&#9803;';
    protected int $startDay = 22;
    protected int $startMonth = 6;
    protected int $endDay = 22;
    protected int $endMonth = 7;
}
