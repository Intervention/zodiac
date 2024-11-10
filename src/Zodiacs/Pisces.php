<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Pisces extends AbstractZodiac
{
    protected int $startDay = 20;
    protected int $startMonth = 2;
    protected int $endDay = 20;
    protected int $endMonth = 3;
    protected string $name = 'pisces';
    protected string $html = '&#9811;';
}
