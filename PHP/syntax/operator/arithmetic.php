<?php

# 算术
$a = 31;
$b = 8;

printf("$a + $b =: %d\n", $a + $b);
printf("$a - $b =: %d\n", $a - $b);
printf("$a * $b=:%d\n", $a * $b);
printf("$a / $b=:%d\n", $a / $b);
// TODO:fix
//printf("$a % $b=:%d\n", ($a % $b));

echo 2 ** 3 .PHP_EOL;

## 自增/自减运算符
## 后置：先赋值后运算
$a = 32;
$b = 8;
$c = $a++;
$d = $b--;
printf("a,b,c,d = %d,%d,%d,%d\n", $a, $b, $c, $d);

## 前置：先运算后复制
$a = 32;
$b = 8;
$c = ++$a;
$d = --$b;
printf("a,b,c,d = %d,%d,%d,%d\n", $a, $b, $c, $d);

var_dump(0 + "3+4+5");

$d = add();
$x = $a++ + ++$b;
$y = --$c + $d--;
echo $x.'_'.$y;

$a = 45;
$b = $a;
$b = 56;
echo $a;
echo $b;

preg_match("/[0-9a-zA-Z]*/", "http://www.baidu.com", $match);
var_dump($match);

$a = 1;
$b = 2;
$c = 3;
function add()
{
    $d = 4;
    $c += isset($a) ? 0 : $a++;
    if ($c > 3) {
        $d++;
    }
    echo $a;
    return $d;
}
