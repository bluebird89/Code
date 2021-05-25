<?php

$obj = new SplStack();
$obj->push(1);
$obj->push(2);
echo $obj->top().PHP_EOL;
$obj->pop();
echo $obj->top().PHP_EOL;
var_dump($obj->isEmpty());
