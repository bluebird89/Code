<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。
//
// 如果数组中不存在目标值 target，返回 [-1, -1]。
//
// 进阶：
//
//
// 你可以设计并实现时间复杂度为 O(log n) 的算法解决此问题吗？
//
//
//
//
// 示例 1：
//
//
//输入：nums = [5,7,7,8,8,10], target = 8
//输出：[3,4]
//
// 示例 2：
//
//
//输入：nums = [5,7,7,8,8,10], target = 6
//输出：[-1,-1]
//
// 示例 3：
//
//
//输入：nums = [], target = 0
//输出：[-1,-1]
//
//
//
// 提示：
//
//
// 0 <= nums.length <= 105
// -109 <= nums[i] <= 109
// nums 是一个非递减数组
// -109 <= target <= 109
//
// Related Topics 数组 二分查找
// 👍 1048 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     *
     * @return Integer[]
     */
    public function searchRange($nums, $target)
    {
        $res = [-1, -1];
        $low = 0;
        $high = count($nums) - 1;
        if ($target > $nums[$high] || $target < $nums[$low]) {
            return $res;
        }

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);

            if ($target == $nums[$mid]) {
                if (($mid == 0) || ($nums[$mid - 1] < $target)) {
                    $res[0] = $mid;
                    break;
                } else {
                    $high = $mid - 1;
                    continue;
                }
            }

            if ($target > $nums[$mid]) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        $low = 0;
        $high = count($nums) - 1;
        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);

            echo $mid;
            if ($target == $nums[$mid]) {
                if (($mid == (count($nums) - 1)) || ($nums[$mid + 1] > $target)) {
                    $res[1] = $mid;
                    break;
                } else {
                    $low = $mid + 1;
                    continue;
                }
            }

            if ($target > $nums[$mid]) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
//var_dump((new Solution())->searchRange([5, 7, 7, 8, 8, 10], 8));
//var_dump((new Solution())->searchRange([1], 1));
var_dump((new Solution())->searchRange([2, 2], 2));
