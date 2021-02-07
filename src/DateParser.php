<?php

namespace Intervention\Zodiac;

use Carbon\Carbon;
use DateTime;
use Exception;

class DateParser
{
    /**
     * Parse given date and return Carbon object
     *
     * @param  mixed $value
     * @return \Carbon\Carbon
     */
    public static function parse($value): Carbon
    {
        switch (true) {
            case is_string($value):
                return self::parseFromString($value);

            case is_int($value):
                return self::parseFromInt($value);

            case is_a($value, 'DateTime'):
                return self::parseFromDateTime($value);

            default:
                throw new Exceptions\NotReadableException(
                    "Unable to parse date ({$value})"
                );
        }
    }

    /**
     * Parse given string to Carbon
     *
     * @param  string $value
     * @return \Carbon\Carbon
     */
    private static function parseFromString(string $value): Carbon
    {
        return Carbon::parse($value);
    }

    /**
     * Parse given integer to Carbon
     *
     * @param  int    $value
     * @return \Carbon\Carbon
     */
    private static function parseFromInt(int $value): Carbon
    {
        return Carbon::createFromTimestamp($value);
    }

    /**
     * Parse given DateTime object to Carbon
     *
     * @param  DateTime $value
     * @return \Carbon\Carbon
     */
    private static function parseFromDateTime(DateTime $value): Carbon
    {
        return Carbon::instance($value);
    }
}
