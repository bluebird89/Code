<?php

$stack = new SplStack();
$stack->push(5);
$stack->push(6);
$stack->push(7);
echo $stack->top().PHP_EOL;
$stack->pop();
echo $stack->top().PHP_EOL;
