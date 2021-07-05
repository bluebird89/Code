<?php


use syntax\php7\ANull;

echo is_countable(['ANull', 'B', 3]) . PHP_EOL;

echo is_countable(new ArrayIterator()) . PHP_EOL;

if (!is_countable(new ANull())) {
    echo "Not countable" . PHP_EOL;
}

$array = ['ANull', 'B', 3];
if (is_countable($array)) {
    var_dump(count($array));
}


$name = "John";
$fn1 = fn($msg) => $msg . ' ' . $name;
var_export($fn1("Hello"));//'Hello John'

$fn = fn($msg1) => fn($msg2) => $msg1 . ' ' . $msg2 . ' ' . $name;
var_export($fn("Hello")("Hi"));

$name = "John";
$x = 1;
//Arrow function includes parameter type, return type and default value
$fn = fn(string $msg = 'Hi'): string => $msg . ' ' . $name;
//Arrow function includes a variadic.
$fn2 = fn(...$x) => $x;
//The arrow function includes by-reference variable passing
$fn3 = fn(&$x) => $x++;
$fn3($x);
echo $x; // 2
var_export($fn("Hello"));//'Hello John'
var_export($fn());//'Hi John'
var_export($fn2(1, 2, 3)); //array ( 0 => 1, 1 => 2, 2 => 3, )
