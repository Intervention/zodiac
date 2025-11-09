<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use Carbon\Carbon;
use Intervention\Zodiac\Exceptions\RuntimeException;

abstract class ChineseZodiac extends Zodiac
{
    final public function __construct(?Carbon $from = null, ?Carbon $to = null)
    {
        if ($from == null && $to === null) {
            throw new RuntimeException('Specify at least one of the arguments $from or $to');
        }

        $from = $from ?: $to->firstOfYear();
        $to = $to ?: $from->lastOfYear();

        $this->startDay = $from->day;
        $this->startMonth = $from->month;
        $this->startYear = $from->year;

        $this->endDay = $to->day;
        $this->endMonth = $to->month;
        $this->endYear = $to->year;
    }

    public static function create(?Carbon $from = null, ?Carbon $to = null): self
    {
        if ($from == null && $to === null) {
            throw new RuntimeException('Specify at least one of the arguments $from or $to');
        }

        return new static(
            from: $from ?: $to->firstOfYear(),
            to: $to ?: $from->lastOfYear(),
        );
    }
}
