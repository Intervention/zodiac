# Intervention Zodiac Calculator

## Installation

You can install this package with Composer.

Require the package via Composer:

    $ composer require intervention/zodiac

The calculator class is built to work with the Laravel Framework. The integration is done in seconds.

Open your Laravel config file `config/app.php` and add service provider in the `$providers` array:
    
    'providers' => [
        Intervention\Zodiac\ZodiacServiceProvider::class
    ],

Add the facade of this package to the `$aliases` array.

    'aliases' => [
        'Zodiac' => Intervention\Zodiac\Facades\Zodiac::class
    ],

## Usage

### Code Example

```php
// get zodiac from a date
$zodiac = Zodiac::make('1980-09-15'); // virgo

// make method takes mixed formats
$zodiac = Zodiac::make('first day of June 2008'); // gemini

// even DateTime objects
$zodiac = Zodiac::make(new DateTime('1977-03-15')); // pesces

// Zodiac Calculator uses the illuminate/translator packages to output localized names
$zodiac = Zodiac::makeLocalized('1977-03-15'); // Fische
```

## License

Intervention Zodiac is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2016 [Oliver Vogel](http://olivervogel.com)
