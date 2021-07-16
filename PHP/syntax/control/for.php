<?php

for ($i = 0, $j = 0; $i < 5; $i++, $j++) {
    if ($j == 2) {
        $i = 0;
    }
    echo $i . ':hllo' . PHP_EOL;
}

$season = array("summer", "winter", "spring", "autumn");
foreach ($season as $key => $value) {
    echo "Season $key: $value" . PHP_EOL;
}

// 九九乘法表
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        printf("%-8s", sprintf("%dx%d=%d", $j, $i, $i * $j));
    }
    echo PHP_EOL;
}

// 遍历正反转换
$arr = range(8, 100, 2);
$count = count($arr);
for ($i = 0; $i < $count; $i++) {
    echo $arr[$i] . ' ';
}
printf("\n");

for ($i = $count - 1; $i >= 0; $i--) {
    echo $arr[$i] . ' ';
}
