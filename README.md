# Intervention Zodiac

[![Latest Version](https://img.shields.io/packagist/v/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac)
[![Tests](https://github.com/Intervention/zodiac/actions/workflows/build.yml/badge.svg)](https://github.com/Intervention/zodiac/actions/workflows/build.yml)
[![Monthly Downloads](https://img.shields.io/packagist/dm/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac/stats)
[![Support me on Ko-fi](https://raw.githubusercontent.com/Intervention/zodiac/main/.github/images/support.svg)](https://ko-fi.com/interventionphp)

Intervention Zodiac is a astrological calculator for PHP 8.2+ that resolves Western and Chinese zodiac signs from various data types.

- Fluent interface to calculate zodiac signs
- Support for western and chinese astrology
- Framework-agnostic

## Installation

The installation works with [Composer](https://getcomposer.org) by running the following command.

```bash
composer require intervention/zodiac
```

Although the library is framework agnostic it comes with a service provider
for the [Laravel Framework](https://zodiac.intervention.io/v7/introduction/frameworks). Which will be discovered
automatically and registers the calculator into your installation.

## Getting Started

Read the full [documentation](https://zodiac.intervention.io) for this library.

## Code Examples

### Calculator

```php
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Astrology;
use Carbon\Carbon;
use DateTime;

// create calculator with astrology
$calculator = new Calculator(Astrology::WESTERN);

// calculate various date formats
$sign = $calculator->calculate('2001-01-01');
$sign = $calculator->calculate('first day of june 2014');
$sign = $calculator->calculate('2018-06-15 12:34:00');
$sign = $calculator->calculate(new DateTime('2001-01-01'));
$sign = $calculator->calculate(Carbon::yesterday());
$sign = $calculator->calculate(228268800);
$sign = $calculator->calculate('228268800');

// override the default astrology
$sign = $calculator->calculate('2001-01-01', Astrology::CHINESE);
```

### Sign

```php
use Intervention\Zodiac\Sign;
use Intervention\Zodiac\Chinese\Sign as ChineseSign;
use Intervention\Zodiac\Western\Sign as WesternSign;
use DateTime;
use Carbon\Carbon;

// parse signs directly
$sign = Sign::fromString('2000-01-01');
$sign = Sign::fromString('first day of june 2014');
$sign = Sign::fromDate(new DateTime('2001-01-01'));
$sign = Sign::fromCarbon(Carbon::yesterday());
$sign = Sign::fromUnix(228268800);
$sign = Sign::fromUnix('228268800');

// parse western signs directly
$sign = WesternSign::fromString('2000-01-01');

// parse chinese signs directly
$sign = ChineseSign::fromString('2000-01-01');

// sign methods
$name = $sign->name(); // 'gemini'
$html = $sign->html(); // '♊︎'
$localized = $sign->localize('fr')->name(); // Gémeaux
$compatibility = $sign->compatibility($sign); // .6
```

## Authors

This library is developed and maintained by [Oliver Vogel](https://intervention.io)

Thanks to the community of [contributors](https://github.com/Intervention/zodiac/graphs/contributors) who have helped to improve this project.

## License

Intervention Zodiac is licensed under the [MIT License](LICENSE).
