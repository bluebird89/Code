<?php

$d = 0b11111111; // 二进制数字 (等于十进制 255)
$b = 0123; // 八进制数 (等于十进制 83)
$a = 1234; // 十进制数
$c = 0x1A; // 十六进制数 (等于十进制 26)

/**
 * @return float
 */
var_dump(floor(5 / 2));

// Return ASCII value of character
echo 'S' . ':' . ord("S") . PHP_EOL; # 83
echo 'Shanghai' . ':' . ord("Shanghai") . PHP_EOL; # 83

// 数字比较，优先转化为数字
var_dump('abcd' == 0); // true

// ark the smaller postion
echo 1 <=> 1; // 0
echo 1 <=> 2 . PHP_EOL; // -1
echo 2 <=> 1 . PHP_EOL; // 1

## 判断字符数字

/**
 * first try to convert to int
 */
$num = 1;
if (is_numeric($num)) {
    echo PHP_EOL . $num . '是数字型' . PHP_EOL;
}
$num1 = '1';
if (is_numeric($num1)) {
    echo $num1 . '是数字型' . PHP_EOL;
} else {
    echo $num1 . '不是数字型';
}

$str = 'abc';
if ((int)$str) {
    echo $str . '是数字';
} else {
    echo $str . '不是数字' . PHP_EOL;
}

//$php_errormsg = "error, try moment later";
//$my_file = @file('non_existent_file') or die("Failed opening file: error was '$php_errormsg'");
//
//$output = `ls -al`;
//echo "<pre>$output</pre>";
//
//$a = array("a" => "apple", "b" => "banana");
//$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");
//$c = $a + $b; // Union of $a and $b
