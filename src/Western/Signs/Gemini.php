<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Western\Signs;

use Intervention\Zodiac\Western\AbstractSign;

class Gemini extends AbstractSign
{
    protected string $name = 'Gemini';
    protected string $html = '&#9802;';
    protected int $startDay = 22;
    protected int $startMonth = 5;
    protected int $endDay = 21;
    protected int $endMonth = 6;
}
