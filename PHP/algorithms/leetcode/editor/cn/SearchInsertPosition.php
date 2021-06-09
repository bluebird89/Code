<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。
//
// 你可以假设数组中无重复元素。
//
// 示例 1:
//
// 输入: [1,3,5,6], 5
//输出: 2
//
//
// 示例 2:
//
// 输入: [1,3,5,6], 2
//输出: 1
//
//
// 示例 3:
//
// 输入: [1,3,5,6], 7
//输出: 4
//
//
// 示例 4:
//
// 输入: [1,3,5,6], 0
//输出: 0
//
// Related Topics 数组 二分查找
// 👍 933 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * 找到比 $target 小的第一个最小元素
     *
     * @param  Integer[]  $nums
     * @param  Integer    $target
     *
     * @return Integer
     */
    public function searchInsert($nums, $target)
    {
        $low = 0;
        $high = count($nums);
        if ($target < $nums[0]) {
            return 0;
        }
        if ($target > $nums[$high - 1]) {
            return $high;
        }

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }

            if ($nums[$mid] < $target) {
                if ($nums[$mid + 1] > $target) {
                    return $mid + 1;
                }
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
