<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Tests\Providers;

use Generator;

class InvalidDataProvider
{
    public static function invalidStringDates(): Generator
    {
        yield ['foobar'];
        yield ['1234567'];
        yield [''];
        yield ['🐇'];
    }
}
