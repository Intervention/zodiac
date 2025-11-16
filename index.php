<?php

use Intervention\Zodiac\Calculator;
use Intervention\Zodiac\Calendar;

require './vendor/autoload.php';

$a = Calculator::fromString('1902-03-03', Calendar::CHINESE);
$b = Calculator::fromString('1923-03-03', Calendar::CHINESE);

echo "<pre>";
var_dump($a->compatibility($b));
echo "</pre>";
exit();
