<?php

require './../../../vendor/autoload.php';

$context = new \Popp\behavior\interpreter\InterpeterContext();
$literal = new \Popp\behavior\interpreter\LiteralExpression('four');

$literal->interpreter($context);
print $context->lookup($literal).PHP_EOL;

$var = new \Popp\behavior\interpreter\VariableExpression('input', 'five');
$var->interpreter($context);
print $context->lookup($var).PHP_EOL;

$newvar = new \Popp\behavior\interpreter\VariableExpression('input');
$newvar->interpreter($context);
print $context->lookup($newvar).PHP_EOL;

$newvar->setValue('six');
$newvar->interpreter($context);
print $context->lookup($var).PHP_EOL;
print $context->lookup($newvar).PHP_EOL.PHP_EOL;

// $input equals "4" or $simple equals "four"
$statement = new \Popp\behavior\interpreter\BooleanOrExpression(
    new \Popp\behavior\interpreter\EqualsExpression($var, new \Popp\behavior\interpreter\LiteralExpression('four')),
    new \Popp\behavior\interpreter\EqualsExpression($var, new \Popp\behavior\interpreter\LiteralExpression('4'))
);

foreach (['four', '4', '52'] as $val) {
    $var->setValue($val);
    print $val;
    $statement->interpreter($context);
    if ($context->lookup($statement)) {
        print ': top marks'.PHP_EOL;
    } else {
        print ': dunce hat on'.PHP_EOL;
    }
}
