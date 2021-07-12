# Intervention Zodiac Calculator

[![Latest Version](https://img.shields.io/packagist/v/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac)
![build](https://github.com/Intervention/zodiac/workflows/build/badge.svg)
[![Monthly Downloads](https://img.shields.io/packagist/dm/intervention/zodiac.svg)](https://packagist.org/packages/intervention/zodiac/stats)

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

#### Zodiac Calculator Class

You can use the Calculator class to create zodiac objects from any type of date.

```php
use Intervention\Zodiac\Calculator as ZodiacCalculator;

// get zodiac from a date
$zodiac = (string) ZodiacCalculator::make('1980-09-15'); // virgo

// make method takes mixed formats
$zodiac = (string) ZodiacCalculator::make('first day of June 2008'); // gemini

// even DateTime objects
$zodiac = (string) ZodiacCalculator::make(new DateTime('1977-03-15')); // pisces

// get zodiac from a Carbon
$zodiac = (string) ZodiacCalculator::make(now());
```

#### Zodiac Class

The Zodiac Calculator class always returns zodiac objects, which come with the following handy methods.

```php
use Intervention\Zodiac\Calculator as ZodiacCalculator;
use Intervention\Zodiac\Zodiacs\Virgo;

// make zodiac from a date
$zodiac = ZodiacCalculator::make('1980-09-15');

echo $zodiac->name(); // virgo

echo $zodiac->html(); // &#9805;

echo $zodiac->localized(); // Jungfrau

if ($zodiac instanceof Virgo) {
    # my zodiac sign is virgo ...
}

```

#### Eloquent Model Trait

By including `Intervention\Zodiac\EloquentZodiacTrait` your [Eloquent Model](https://laravel.com/docs/eloquent) gets a new `zodiac` attribute, which is created based on the `birthday` attribute of the current model and returns a zodiac object.

```php
class User extends Model
{
    // include trait
    use \Intervention\Zodiac\EloquentZodiacTrait;
    
    // Optional: If you want overwrite attribute. By default `birthday`
    protected $zodiacAttribute = 'custom-attribute';
}

// retrieve zodiac attribute
$user = App\User::create(['birthday' => '1980-03-15']);
$zodiac = $user->zodiac; // Intervention\Zodiac\Zodiacs\Pisces
```


## License

Intervention Zodiac is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2016 [Oliver Vogel](https://olivervogel.com/)
