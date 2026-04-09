<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use DateTimeInterface;
use IteratorAggregate;

/**
 * @extends IteratorAggregate<\Intervention\Zodiac\DateRange>
 */
interface PeriodInterface extends IteratorAggregate
{
    /**
     * Determine if the current period contains the given date.
     */
    public function contains(DateTimeInterface $date): bool;
}
