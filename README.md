# Intervention Zodiac

[![Latest Version](https://img.shields.io/packagist/v/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac)
[![Tests](https://github.com/Intervention/zodiac/actions/workflows/build.yml/badge.svg)](https://github.com/Intervention/zodiac/actions/workflows/build.yml)
[![Monthly Downloads](https://img.shields.io/packagist/dm/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac/stats)
[![Support me on Ko-fi](https://raw.githubusercontent.com/Intervention/zodiac/main/.github/images/support.svg)](https://ko-fi.com/interventionphp)

Intervention Zodiac is a calculator for zodiac signs to resolve the respective
zodiac sign from various data types.

## Installation

You can install this package with Composer.

Require the package via Composer:

    $ composer require intervention/zodiac

Although the library is **framework agnostic** it comes with a service provider
for the [Laravel Framework](https://www.laravel.com/). Which will be discovered
automatically and registers the calculator into your installation.

## Documentation

Read the full [documentation](https://zodiac.intervention.io) for this library.

## Code Examples

```php
use Intervention\Zodiac\Calculator;
use DateTime;
use Carbon\Carbon;

// get zodiac object from a date
$zodiac = Calculator::make('1980-09-15');

// method takes mixed formats
$zodiac = Calculator::make('first day of June 2008');

// create from DateTime object
$zodiac = Calculator::make(new DateTime('1977-03-15'));

// get zodiac from a Carbon object
$zodiac = Calculator::make(Carbon::yesterday());

// get zodiac from unix timestamp
$zodiac = Calculator::make(228268800);
```

```php
use Intervention\Zodiac\Calculator;
use DateTime;
use Carbon\Carbon;

// calculate zodiac sing
$zodiac = Calculator::make('1977-06-17');

$name = $zodiac->name(); // 'gemini'
$html = $zodiac->html(); // '♊︎'
$localized = $zodiac->localized('fr'); // Gémeaux
$compatibility = $zodiac->compatibility($zodiac); // 6
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
