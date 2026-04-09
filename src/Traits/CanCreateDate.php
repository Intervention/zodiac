<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Traits;

use DateTimeImmutable;
use Exception;
use Intervention\Zodiac\Exceptions\InvalidArgumentException;

trait CanCreateDate
{
    /**
     * Create DateTimeImmutable from given year, month and day.
     *
     * @throws InvalidArgumentException
     */
    public static function createDate(int $year, int $month, int $day): DateTimeImmutable
    {
        try {
            return new DateTimeImmutable(sprintf('%04d-%02d-%02d', $year, $month, $day));
        } catch (Exception $e) {
            throw new InvalidArgumentException(
                'Failed to create date from year: ' . $year . ', month: ' . $month . ', day: ' . $day,
                previous: $e,
            );
        }
    }
}
