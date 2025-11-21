<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Scorpio extends AbstractSign
{
    protected string $name = 'Scorpio';
    protected string $html = '&#9807;';
    protected int $startDay = 24;
    protected int $startMonth = 10;
    protected int $endDay = 22;
    protected int $endMonth = 11;
}
