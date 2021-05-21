<?php

# 算术运算符
$a = 32;
$b = 8;
$a += $b;
printf("%d\n", $a);
$a -= $b;
printf("%d\n", $a);
$a *= $b;
printf("%d\n", $a);
$a /= $b;
printf("%d\n", $a);
$a %= $b;
printf("%d\n", $a);
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

## 比较运算符
var_dump(10 <=> 12);
var_dump(13 <=> 12);
var_dump(12 <=> 12);

# == vs ===: 只比较变量值 除了比较变量值，还会比较变量类型
$c = 32;
$d = 32.0;
var_dump($c == $d);
var_dump($c === $d);

## 逻辑运算符
# 转换为 boolean 时，以下值被认为是 FALSE：
#  布尔值 FALSE 本身
# 整型值 0（零）
#  浮点型值 0.0（零）
# 空字符串，以及字符串 "0"
# 不包括任何元素的数组
# 特殊类型 NULL（包括尚未赋值的变量）
# 从空标记生成的 SimpleXML 对象

// 越靠前优先级越高
echo 0 ?: 1 ?: 2 ?: 3; //1
echo 0 ?: 0 ?: 2 ?: 3; //2
echo 0 ?: 0 ?: 0 ?: 3; //3
echo 0 ?: 4; // 4

$a = 36;
$b = 56;
$c = 67;
echo $a ?? $b ?? $c;

var_dump(0 + "3+4+5");

echo 8367 & 8192 ."\n";
echo 8366 & 8192 ."\n";

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

$d = add();
$x = $a++ + ++$b;
$y = --$c + $d--;
echo $x.'_'.$y;


/**
 *  大小写转换
 **/
echo 'A' | ' ';
echo 'a' & '_';
echo 'a' ^ ' ';
echo 'A' ^ ' '.PHP_EOL;

// 是否异号
echo (bool) ((-1 ^ 2) < 0).PHP_EOL;
echo ((1 ^ 2) < 0).PHP_EOL;

// switch variable
$a = 1;
$b = 3;
$a ^= $b;
$b ^= $a;
$a ^= $b;
echo $a.' '.$b;


$a < $b; # ($a <=> $b) === -1
$a <= $b;   # ($a <=> $b) === -1 || ($a <=> $b) === 0
$b == $a; #  ($a <=> $b) === 0
$a != $b; #($a <=> $b) !== 0
$a >= $b;# ($a <=> $b) === 1 || ($a <=> $b) === 0
$a > $b;#($a <=> $b) === 1
