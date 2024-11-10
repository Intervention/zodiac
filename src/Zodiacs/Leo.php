<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Zodiacs;

use Intervention\Zodiac\AbstractZodiac;

class Leo extends AbstractZodiac
{
    protected int $startDay = 23;
    protected int $startMonth = 7;
    protected int $endDay = 23;
    protected int $endMonth = 8;
    protected string $name = 'leo';
    protected string $html = '&#9804;';
}
