<?php

use Carbon\Carbon;
use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Calendar;

require './vendor/autoload.php';

$res = Calculator::fromCarbon(Carbon::parse('1939-04-12'), Calendar::CHINESE);

echo "<pre>";
var_dump($res);
echo "</pre>";
exit();
