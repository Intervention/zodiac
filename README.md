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
$zodiac = Calculator::fromString('1980-09-15');

// method takes mixed formats
$zodiac = Calculator::fromString('first day of June 2008');

// create from DateTime object
$zodiac = Calculator::fromDate(new DateTime('1977-03-15'));

// since Carbon dates extend from DateTime they can also be read
$zodiac = Calculator::fromDate(Carbon::yesterday());

// get zodiac from unix timestamp
$zodiac = Calculator::fromUnix(228268800);
```

### Chinese Zodiac

It is also possible to calculate the traditional chinese zodiac classification in the same way.

```php
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Calendar;
use DateTime;
use Carbon\Carbon;

// get zodiac object from a date
$zodiac = Calculator::fromString('1980-09-15', Calendar::CHINESE);

// method takes mixed formats
$zodiac = Calculator::fromString('first day of June 2008', Calendar::CHINESE);

// create from DateTime object
$zodiac = Calculator::fromDate(new DateTime('1977-03-15'), Calendar::CHINESE);

// since Carbon dates extend from DateTime they can also be read
$zodiac = Calculator::fromDate(Carbon::yesterday(), Calendar::CHINESE);

// get zodiac from unix timestamp
$zodiac = Calculator::fromUnix(228268800, Calendar::CHINESE);
```

### Zodiac Sign Interface

```php
use Intervention\Zodiac\Calculator;
use DateTime;
use Carbon\Carbon;

// calculate zodiac sing
$zodiac = Calculator::fromString('1977-06-17'); // instance of Intervention\Zodiac\Interfaces\SignInterface

$name = $zodiac->name(); // 'Gemini'
$name = $zodiac->localized('fr')->name(); // Gémeaux
$html = $zodiac->html(); // '♊︎'
$compatibility = $zodiac->compatibility($zodiac); // .6
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
