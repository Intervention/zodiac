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
