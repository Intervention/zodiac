<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Interfaces;

use Carbon\CarbonInterface;
use IteratorAggregate;

/**
 * @extends IteratorAggregate<\Carbon\CarbonPeriod>
 */
interface PeriodInterface extends IteratorAggregate
{
    /**
     * Determine if the current period contains the given date
     */
    public function contains(CarbonInterface $date): bool;
}
