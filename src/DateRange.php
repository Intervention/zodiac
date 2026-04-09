<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use DateTimeImmutable;
use DateTimeInterface;
use Stringable;

class DateRange implements Stringable
{
    public function __construct(
        protected DateTimeImmutable $start,
        protected DateTimeImmutable $end,
        protected bool $excludeEnd = false,
    ) {
        //
    }

    /**
     * Determine if the given date is within the range.
     */
    public function contains(DateTimeInterface $date): bool
    {
        if ($this->excludeEnd) {
            return $date >= $this->start && $date < $this->end;
        }

        return $date >= $this->start && $date <= $this->end;
    }

    /**
     * Cast to string representation.
     */
    public function __toString(): string
    {
        return $this->start->format('Y-m-d') . ' - ' . $this->end->format('Y-m-d');
    }
}
