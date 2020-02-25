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

#### Zodiac Calculator Class

You can use the Calculator class to create zodiac objects from any type of date.

```php
use Intervention\Zodiac\Calculator as Zodiac;

// get zodiac from a date
$zodiac = (string) Zodiac::make('1980-09-15'); // virgo

// make method takes mixed formats
$zodiac = (string) Zodiac::make('first day of June 2008'); // gemini

// even DateTime objects
$zodiac = (string) Zodiac::make(new DateTime('1977-03-15')); // pesces
```

#### Zodiac Class

The Zodiac Calculator class always returns zodiac objects, which come with the following handy methods.

```php
use Intervention\Zodiac\Calculator as Zodiac;

// make zodiac from a date
$zodiac = Zodiac::make('1980-09-15');

echo $zodiac->name(); // virgo

echo $zodiac->html(); // &#9805;

echo $zodiac->localized(); // Jungfrau

if ($zodiac instanceof Intervention\Zodiac\Zodiacs\Virgo) {
    # my zodiac sign is virgo ...
}

```

#### Eloquent Model Trait

By including `Intervention\Zodiac\EloquentZodiacTrait` your [Eloquent Model](https://laravel.com/docs/eloquent) gets a new `zodiac` attribute, which is created based on the `birthday` attribute of the current model and returns a zodiac object.

```php
// include trait
class User extends Model
{
    use \Intervention\Zodiac\EloquentZodiacTrait;
}

// retrieve zodiac attribute
$user = App\User::create(['birthday' => '1980-03-15']);
$zodiac = $user->zodiac // Intervention\Zodiac\Zodiacs\Pisces
```


## License

Intervention Zodiac is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2016 [Oliver Vogel](https://olivervogel.com/)
