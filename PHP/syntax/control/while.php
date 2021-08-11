<?php

$n = 1;
while ($n <= 10) {
    echo "$n" . PHP_EOL;
    $n++;
}
$nums = [1, 2, 3, 4, 5];
$end = 0;
while ($nums[$end] == $nums[--$end]) ;
