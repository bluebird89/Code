<?php

$a = 1234; // 十进制数
$b = 0123; // 八进制数 (等于十进制 83)
$c = 0x1A; // 十六进制数 (等于十进制 26)
$d = 0b11111111; // 二进制数字 (等于十进制 255)

$str = 'Hello text within single quote';
$str2 = "Using double \"quote\" with backslash inside double quoted string";
echo 'You can also have embedded newlines in
strings this way as it is
okay to do';

$bar = "bar
asfasfd
    dgdfgsdfgdfgf ";

echo ord("S"); # 83
echo ord("Shanghai"); # 83

print # 一个语法结构(language constructs), 并不是一个函数, 参数的list并不要求有括号

// 涉及数字比较，优先转化为数字
    var_dump('abcd' == 0);
var_dump(0 == 'abcd');
var_dump('0' == 'abcd');

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

echo 1 <=> 1; // 0
echo 1 <=> 2; // -1
echo 2 <=> 1; // 1

$my_file = @file('non_existent_file') or die("Failed opening file: error was '$php_errormsg'");

$output = `ls -al`;
echo "<pre>$output</pre>";

$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");
$c = $a + $b; // Union of $a and $b

class MyClass
{
}

$a = new MyClass;
var_dump(!($a instanceof stdClass)); # true

## 判断字符数字
$num = 1;
$num1 = '1';
$str = 'abc';

if (is_numeric($num)) {
    echo $num.'是数字型';
}
if (is_numeric($num1)) {
    echo $num1.'是数字型';
} else {
    echo $num1.'不是数字型';
}

if (intval($str)) {
    echo $str.'是数字';
} else {
    echo $str.'不是数字';
}
if (intval($num1)) {
    echo $num1.'是数字';
} else {
    echo $num1.'不是数字';
}
