<?php

/**
 * 时间复杂度：比较、换位都算一步
 */

$arr = [99, 98, 97, 96, 95];

function arrayPrinter($arr, $steps = 0)
{
    echo implode(" ", $arr)." Steps:".$steps.PHP_EOL;
}

function swap(&$arr, $i, $j)
{
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}

function bubble(array &$arr)
{
    $steps = 0;
    $unsorted_until_index = count($arr) - 1;
    $sorted = false;

    while (!$sorted) {
        $sorted = true;
        for ($j = 0; $j < $unsorted_until_index; $j++) {
            $steps++;
            if ($arr[$j] > $arr[$j + 1]) {
                swap($arr, $j, $j + 1);
                $sorted = false;
                $steps++;
            }
        }
        $unsorted_until_index--;
    }

    arrayPrinter($arr, $steps);
}

bubble($arr);


$arr = [99, 98, 97, 96, 95];
function selection(array &$arr)
{
    $steps = 0;
    for ($j = 0; $j < count($arr); $j++) {
        $min_index = $j;

        for ($i = $j + 1; $i < count($arr); $i++) {
            $steps++;
            if ($arr[$i] < $arr[$min_index]) {
                $min_index = $i;
            }
        }

        if ($min_index != $j) {
            swap($arr, $j, $min_index);
            $steps++;
        }

    }

    arrayPrinter($arr, $steps);
}

selection($arr);


$arr = [99, 98, 97, 96, 95];
function insert(array &$arr)
{
    $steps = 0;

    for ($i = 1; $i < count($arr); $i++) {
        $steps++;
        $temp_value = $arr[$i];
        $j = $i;

        while ($j > 0 && $arr[$j - 1] > $temp_value) {
            // 比较与平移两部操作
            $steps = $steps + 2;
            $arr[$j] = $arr[$j - 1];
            $j--;
        }
        $steps++;
        $arr[$j] = $temp_value;
    }

    arrayPrinter($arr, $steps);
}

insert($arr);


/*
 * 快速排序
 * partion:保证分组值已经被放置到正确的位置上
 */
$arr = [99, 98, 97, 96, 95];
//$arr = [0, 5, 2, 1, 6, 3];
function partition(array &$arr, $left_pointer, $right_pointer)
{
    $pivot_position = $right_pointer;
    $pivot = $arr[$pivot_position];
    $right_pointer--;
    $steps = 0;

    while (true) {
        while ($arr[$left_pointer] < $pivot) {
            $left_pointer++;
            $steps++;
        }

        while ($right_pointer > 0 && $arr[$right_pointer] > $pivot) {
            $right_pointer--;
            $steps++;
        }

        if ($left_pointer >= $right_pointer) {
            break;
        } else {
            $steps++;
            swap($arr, $left_pointer, $right_pointer);
        }
    }
    echo $left_pointer . "_";
    swap($arr, $left_pointer, $pivot_position);
    return $left_pointer;
}

function quick(array &$arr, int $left_index, int $right_index)
{
    if ($right_index <= $left_index) {
        return;
    }

    $pivot_position = partition($arr, $left_index, $right_index);
    quick($arr, $left_index, $pivot_position - 1);
    quick($arr, $pivot_position + 1, $right_index);
}

quick($arr, 0, count($arr) - 1);
arrayPrinter($arr);
