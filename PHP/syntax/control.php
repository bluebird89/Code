<?php

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

for ($i = 0, $j = 0; $i < 5 - $j; $i++) {
    if ($i == 2) {
        $j++;
    }
    echo $i.':hllo'.PHP_EOL;
}
die;

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

// TODO:遍历的正反转换
// step into
// add watch
