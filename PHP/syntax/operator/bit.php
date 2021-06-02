<?php

/**
 *  大小写转换
 **/
echo 'A' | ' '.PHP_EOL;
echo 'a' & '_'.PHP_EOL;
echo 'a' ^ ' '.PHP_EOL;
echo 'A' ^ ' '.PHP_EOL;

// 是否异号
echo (bool) ((-1 ^ 2) < 0).PHP_EOL;
echo((1 ^ 2) < 0).PHP_EOL;

// switch variable
$a = 1;
$b = 3;
$a ^= $b;
$b ^= $a;
$a ^= $b;
echo $a.' '.PHP_EOL;

echo 8367 & 8192 .PHP_EOL;
echo 8366 & 8192 .PHP_EOL;

define("READ", 1);
define("WRITE", 2);
define("DELETE", 4);
define("UPDATE", 8);

$permission = READ | WRITE; // 赋予权限 加法
$permissions = READ & ~WRITE; // 禁止写权限 反向全量的选法

# 做权限验证
echo 2 & 10; // 输出：2
echo 2 | 10; // 输出结果：10
echo 1 ^ 1; // 输出结果：0
echo 1 ^ 0; // 输出结果：1

//判断权限
if (READ & $permission) {
    echo 'OK';
}

# 异或运算同样的值两次能还原为原理的值
$arr = [6, 8];
$arr[0] = $arr[0] ^ $arr[1];
var_dump($arr); # array(2) { [0]=> int(14) [1]=> int(8) }
$arr[1] = $arr[0] ^ $arr[1];
var_dump($arr); # array(2) { [0]=> int(14) [1]=> int(6) }
$arr[0] = $arr[0] ^ $arr[1];
var_dump($arr); # array(2) { [0]=> int(8) [1]=> int(6) }
