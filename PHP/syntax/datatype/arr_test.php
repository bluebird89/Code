<?php
$nums = [2, 2, 1];

foreach ($nums as $k => $v) {
    unset($nums[$k]);
    if (!in_array($v, $nums)) {
        echo $v . PHP_EOL;
        break;
    } else {
        $index = array_search($v, $nums);
        echo $index . PHP_EOL;
        if ($index) {
            // unset not effect
            unset($nums[$index]);
            continue;
        }
    }
}

var_dump($nums);
