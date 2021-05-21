<?php
//  减少if...else...的使用,提前return异常
//　如果是在一个函数里面会先处理异常的情况，然后提前return代码，最后再执行正常的逻辑
function doSomething($x)
{
    if ($x < 4) {
        return false;
    }
    if ($x > 19) {
        return false;
    }

    return true;
}

#!/usr/bin/env php
print "Hello, Red Hat Developers World from PHP ".PHP_VERSION."\n";
echo "<h2>Hello First PHP</h2>";
printf('(%1$2d = %1$04b) = (%2$2d = %2$04b)'.' %3$s (%4$2d = %4$04b)'."\n", $result, $value, '&', $test);

$num = 12;
if ($num % 2 == 0) {
    echo "$num is even number";
} else {
    echo "$num is odd number";
}

$a = 0;
$b = 0;
if ($a > $b) :
    echo $a." is greater than ".$b;
elseif ($a == $b) : // 注意使用了一个单词的 elseif
    echo $a." equals ".$b;
else :
    echo $a." is neither greater than or equal to ".$b;
endif;

switch ($num) {
    case 10:
        echo("number is equals to 10");
        break;
    case 20:
        echo("number is equal to 20");
        break;
    case 30:
        echo("number is equal to 30");
        break;
    default:
        echo("number is not equal to 10, 20 or 30");
}

for ($i = 0, $j = 0; $i < 5; $i++, $j++) {
    print $i;
}

$season = array("summer", "winter", "spring", "autumn");
foreach ($season as $key => $value) {
    echo "Season is: $value<br />";
}

$n = 1;
while ($n <= 10) {
    echo "$n<br/>";
    $n++;
}

$n = 1;
do {
    echo "$n<br/>";
    $n++;
} while ($n <= 10);


goto a;
echo 'Foo';

a:
echo 'Bar';

// 通过二维数组生成九九乘法表
$multi = [];
for ($j = 0; $j < 9; $j++) {
    for ($i = 0; $i < 9; $i++) {
        $n1 = $i + 1;
        $n2 = $j + 1;
        if ($n1 < $n2) {  // 摒除重复的记录
            continue;
        }
        $multi[$i][$j] = sprintf("%dx%d=%d", $n2, $n1, $n1 * $n2);
    }
}

// 打印九九乘法表
foreach ($multi as $row) {
    foreach ($row as $item) {
        printf("%-8s", $item);  // 位宽为8，左对齐
    }
    printf("\n");
}

// step into
// add watch
