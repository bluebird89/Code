<?php

// 执行字符串语句
$num1 = 1;
$num2 = 4;
$operator = '+';

$exp = "$num1$operator$num2;";
var_dump(exec('php -r "echo $exp"'));
