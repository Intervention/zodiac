<?php

declare(strict_types=1);

namespace Intervention\Zodiac\Chinese;

use Intervention\Zodiac\Exceptions\RuntimeException;
use Intervention\Zodiac\Chinese\Signs\Dog;
use Intervention\Zodiac\Chinese\Signs\Dragon;
use Intervention\Zodiac\Chinese\Signs\Goat;
use Intervention\Zodiac\Chinese\Signs\Horse;
use Intervention\Zodiac\Chinese\Signs\Monkey;
use Intervention\Zodiac\Chinese\Signs\Ox;
use Intervention\Zodiac\Chinese\Signs\Pig;
use Intervention\Zodiac\Chinese\Signs\Rabbit;
use Intervention\Zodiac\Chinese\Signs\Rat;
use Intervention\Zodiac\Chinese\Signs\Rooster;
use Intervention\Zodiac\Chinese\Signs\Snake;
use Intervention\Zodiac\Chinese\Signs\Tiger;
use TypeError;

class NewYearCalculator
{
    /**
     * @var array<int, array{int, int, string}> $table
     */
    private static array $table = [
        1901 => [2, 4, Ox::class],
        1902 => [2, 5, Tiger::class],
        1903 => [2, 5, Rabbit::class],
        1904 => [2, 5, Dragon::class],

        2000 => [2, 5, Dragon::class],
        2001 => [1, 24, Snake::class],
        2002 => [2, 12, Horse::class],
        2003 => [2, 1, Goat::class],
        2004 => [1, 22, Monkey::class],
        2005 => [2, 9, Rooster::class],
        2006 => [1, 29, Dog::class],
        2007 => [2, 18, Pig::class],
        2008 => [2, 7, Rat::class],
        2009 => [1, 26, Ox::class],
        2010 => [2, 14, Tiger::class],
        2011 => [2, 3, Rabbit::class],
        2012 => [1, 23, Dragon::class],
        2013 => [2, 10, Snake::class],
        2014 => [1, 31, Horse::class],
        2015 => [2, 19, Goat::class],
        2016 => [2, 8, Monkey::class],
        2017 => [1, 28, Rooster::class],
        2018 => [2, 16, Dog::class],
        2019 => [2, 5, Pig::class],
        2020 => [1, 25, Rat::class],
        2021 => [2, 12, Ox::class],
        2022 => [2, 1, Tiger::class],
        2023 => [1, 22, Rabbit::class],
        2024 => [2, 10, Dragon::class],
        2025 => [1, 29, Snake::class],
        2026 => [2, 17, Horse::class],
        2027 => [2, 6, Goat::class],
        2028 => [1, 26, Monkey::class],
        2029 => [2, 13, Rooster::class],
        2030 => [2, 3, Dog::class],
        2031 => [1, 23, Pig::class],
        2032 => [2, 11, Rat::class],
        2033 => [1, 31, Ox::class],
        2034 => [2, 19, Tiger::class],
        2035 => [2, 8, Rabbit::class],
        2036 => [1, 28, Dragon::class],
        2037 => [2, 15, Snake::class],
        2038 => [2, 4, Horse::class],
        2039 => [1, 24, Goat::class],
        2040 => [2, 12, Monkey::class],
        2041 => [2, 1, Rooster::class],
        2042 => [1, 22, Dog::class],
        2043 => [2, 10, Pig::class],
        2044 => [1, 30, Rat::class],
        2045 => [2, 17, Ox::class],
        2046 => [2, 6, Tiger::class],
        2047 => [1, 26, Rabbit::class],
        2048 => [2, 14, Dragon::class],
        2049 => [2, 2, Snake::class],
        2050 => [1, 23, Horse::class],
        2051 => [2, 11, Goat::class],
        2052 => [2, 1, Monkey::class],
        2053 => [2, 19, Rooster::class],
        2054 => [2, 8, Dog::class],
        2055 => [1, 28, Pig::class],
        2056 => [2, 15, Rat::class],
        2057 => [2, 04, Ox::class],
        2058 => [1, 24, Tiger::class],
        2059 => [2, 12, Rabbit::class],
        2060 => [2, 2, Dragon::class],
        2061 => [1, 21, Snake::class],
        2062 => [2, 9, Horse::class],
        2063 => [1, 29, Goat::class],
        2064 => [2, 17, Monkey::class],
        2065 => [2, 5, Rooster::class],
        2066 => [1, 26, Dog::class],
        2067 => [2, 14, Pig::class],
        2068 => [2, 3, Rat::class],
        2069 => [1, 23, Ox::class],
        2070 => [2, 11, Tiger::class],
        2071 => [1, 31, Rabbit::class],
        2072 => [2, 19, Dragon::class],
        2073 => [2, 7, Snake::class],
        2074 => [1, 27, Horse::class],
        2075 => [2, 15, Goat::class],
        2076 => [2, 5, Monkey::class],
        2077 => [1, 24, Rooster::class],
        2078 => [2, 12, Dog::class],
        2079 => [2, 2, Pig::class],
        2080 => [1, 22, Rat::class],
        2081 => [2, 9, Ox::class],
        2082 => [1, 29, Tiger::class],
        2083 => [2, 17, Rabbit::class],
        2084 => [2, 6, Dragon::class],
        2085 => [1, 26, Snake::class],
        2086 => [2, 14, Horse::class],
        2087 => [2, 3, Goat::class],
        2088 => [1, 24, Monkey::class],
        2089 => [2, 10, Rooster::class],
        2090 => [1, 30, Dog::class],
        2091 => [2, 18, Pig::class],
        2092 => [2, 7, Rat::class],
        2093 => [1, 27, Ox::class],
        2094 => [2, 15, Tiger::class],
        2095 => [2, 5, Rabbit::class],
        2096 => [1, 25, Dragon::class],
        2097 => [2, 12, Snake::class],
        2098 => [2, 1, Horse::class],
        2099 => [1, 21, Goat::class],
        2100 => [2, 9, Monkey::class],
    ];

    public static function newYear(int $year): NewYear
    {
        try {
            // @phpstan-ignore-next-line
            return new NewYear($year, ...self::$table[$year] ?? [null, null, null]);
        } catch (TypeError) {
            throw new RuntimeException('Missing new year data for ' . $year);
        }
    }
}
