# Intervention Zodiac Calculator

## Installation

You can install this package with Composer.

Require the package via Composer:

    $ composer require intervention/zodiac

The calculator class is built to work with the Laravel Framework. The integration is done in seconds.

Open your Laravel config file `config/app.php` and add service provider in the `$providers` array:
    
    'providers' => [
        'Intervention\Zodiac\ZodiacServiceProvider'
    ],

Add the facade of this package to the `$aliases` array.

    'aliases' => [
        'Zodiac' => 'Intervention\Zodiac\Facades\Zodiac'
    ],
  