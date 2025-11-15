<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use ArrayIterator;
use Carbon\CarbonInterface;
use Carbon\CarbonPeriod;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Stringable;
use Traversable;

class Period implements PeriodInterface, Stringable
{
    /**
     * @param array<int, \Carbon\CarbonPeriod> $periods
     */
    public function __construct(protected array $periods = [])
    {
        //
    }

    /**
     * {@inheritdoc}
     *
     * @see PeriodInterface::contains()
     */
    public function contains(CarbonInterface $date): bool
    {
        foreach ($this->periods as $period) {
            if ($period->contains($date)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     *
     * @see IteratorAggregate::getIterator()
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->periods);
    }

    /**
     * Cast object to string
     */
    public function __toString(): string
    {
        return implode(', ', array_map(fn(CarbonPeriod $period): string => (string) $period, $this->periods));
    }
}
