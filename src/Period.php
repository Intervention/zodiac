<?php

declare(strict_types=1);

namespace Intervention\Zodiac;

use ArrayIterator;
use DateTimeInterface;
use Intervention\Zodiac\Interfaces\PeriodInterface;
use Stringable;
use Traversable;

class Period implements PeriodInterface, Stringable
{
    /**
     * @param array<int, DateRange> $periods
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
    public function contains(DateTimeInterface $date): bool
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
     * Cast object to string.
     */
    public function __toString(): string
    {
        return implode(', ', array_map(fn(DateRange $period): string => (string) $period, $this->periods));
    }
}
