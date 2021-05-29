<?php

/*
 * LeetCode 第 162 号问题：寻找峰值
 * 峰值元素是指其值大于左右相邻值的元素。
 * 给定一个输入数组 nums，其中 nums[i] ≠ nums[i+1]，找到峰值元素并返回其索引。
 * 数组可能包含多个峰值，在这种情况下，返回任何一个峰值所在位置即可。
 */
function findPeakElement($nums)
{
    if ($nums == null || count($nums) == 0) {
        return -1;
    }

    $start = 0;
    $end = count($nums) - 1;
    while ($start + 1 < $end) {
        $mid = $start + ($end - $start) / 2;

        if ($nums[$mid] > $nums[$mid - 1] && $nums[$mid] > $nums[$mid + 1]) {
            return $mid;
        } else {
            if ($nums[$mid] > $nums[$mid - 1] && $nums[$mid] < $nums[$mid + 1]) {
                $start = $mid;
            } else {
                $end = $mid;
            }
        }
    }

    if ($nums[$start] > $nums[$end]) {
        return $start;
    }

    return $end;
}

echo findPeakElement([1,2,1,3,5,6,4]);
