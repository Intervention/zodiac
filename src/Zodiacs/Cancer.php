<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Cancer extends AbstractZodiac
{
    protected int $startDay = 22;
    protected int $startMonth = 6;
    protected int $endDay = 22;
    protected int $endMonth = 7;
    protected string $name = 'cancer';
    protected string $html = '&#9803;';
}
