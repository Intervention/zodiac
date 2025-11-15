<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Calendar;
use Intervention\Zodiac\Period;

require './vendor/autoload.php';

// $res = Calculator::fromString('2012-01-23', Calendar::CHINESE);
// $res = Calculator::withCalendar(Calendar::CHINESE)->fromString('january 2005');

// $res = [
//      (string) (new Rabbit())->period(2012),
//      (string) (new Dragon())->period(2012),
// ];

$res = new Period(
    [CarbonPeriod::since('2001-01-01')->until('2001-02-05')],
    [CarbonPeriod::since('2001-06-01')->until('2001-06-06')],
);

echo "<pre>";
var_dump($res->contains(Carbon::parse('2001-06-03')));
echo "</pre>";
exit();
