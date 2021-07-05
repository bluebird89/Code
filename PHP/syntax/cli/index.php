<?php

$result = "PHP";
$value = 404;
$test = 'Cli';

echo "Hello, Red Hat Developers World from PHP " . PHP_VERSION;
echo "<h2>Hello First PHP</h2>";
printf('(%1$2d = %1$04b) = (%2$2d = %2$04b)' . ' %3$s (%4$2d = %4$04b)' . PHP_EOL, $result, $value, '&', $test);

echo php_sapi_name() . PHP_EOL;
echo PHP_SAPI . PHP_EOL;
