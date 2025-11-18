# Intervention Zodiac

[![Latest Version](https://img.shields.io/packagist/v/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac)
[![Tests](https://github.com/Intervention/zodiac/actions/workflows/build.yml/badge.svg)](https://github.com/Intervention/zodiac/actions/workflows/build.yml)
[![Monthly Downloads](https://img.shields.io/packagist/dm/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac/stats)
[![Support me on Ko-fi](https://raw.githubusercontent.com/Intervention/zodiac/main/.github/images/support.svg)](https://ko-fi.com/interventionphp)

Intervention Zodiac is a astrological calculator that resolves Western and Chinese zodiac signs from various data types.

## Installation

The installation works with [Composer](https://getcomposer.org) by running the following command.

    $ composer require intervention/zodiac

Although the library is **framework agnostic** it comes with a service provider
for the [Laravel Framework](https://zodiac.intervention.io/v6/introduction/frameworks). Which will be discovered
automatically and registers the calculator into your installation.

## Documentation

Read the full [documentation](https://zodiac.intervention.io) for this library.

## Code Examples

### Calculator

```php
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Astrology;
use Carbon\Carbon;
use DateTime;

$sign = Calculator::fromString('2001-01-01');
$sign = Calculator::fromString('2001-01-01', Astrology::CHINESE);

// create western calculator
$sign = Calculator::western()
    ->fromString('2001-01-01'); 

// create chinese calculator
$sign = Calculator::chinese()
    ->fromString('2001-01-01'); 

// override default
$sign = Calculator::western()
    ->fromString('2001-01-01', Astrology::CHINESE);

// pass astrology as a parameter
$sign = Calculator::withAstrology(Astrology::CHINESE)
    ->fromString('2001-01-01');

// override default
$sign = Calculator::withAstrology(Astrology::CHINESE)
    ->fromString('2001-01-01', Astrology::WESTERN);

// parse various date formats
$sign = Calculator::fromString('first day of june 2014');
$sign = Calculator::fromString('2018-06-15 12:34:00');
$sign = Calculator::fromDate(new DateTime('2001-01-01'));
$sign = Calculator::fromDate(Carbon::yesterday());
$sign = Calculator::fromUnix(228268800);
$sign = Calculator::fromUnix('228268800');
```

### Sign

```php
use Intervention\Zodiac\Calculator;
use DateTime;
use Carbon\Carbon;

// calculate zodiac sing
$sign = Calculator::fromDate($date);

$name = $sign->name(); // 'gemini'
$html = $sign->html(); // '♊︎'
$localized = $sign->localize('fr')->name(); // Gémeaux
$compatibility = $sign->compatibility($sign); // .6
```

## Development & Testing

With this package comes a Docker image to build a test suite container. To build this container you have to have Docker installed on your system.

You can run all tests with the following command.

```bash
docker-compose run --rm --build tests
```

Run the static analyzer on the code base.

```bash
docker-compose run --rm --build analysis
```

## Authors

This library is developed and maintained by [Oliver Vogel](https://intervention.io)

Thanks to the community of [contributors](https://github.com/Intervention/zodiac/graphs/contributors) who have helped to improve this project.

## License

Intervention Zodiac is licensed under the [MIT License](LICENSE).
