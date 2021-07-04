<?php

namespace Algorithms\leetcode\editor\cn;

//整数数组 nums 按升序排列，数组中的值 互不相同 。
//
// 在传递给函数之前，nums 在预先未知的某个下标 k（0 <= k < nums.length）上进行了 旋转，使数组变为 [nums[k], nums[
//k+1], ..., nums[n-1], nums[0], nums[1], ..., nums[k-1]]（下标 从 0 开始 计数）。例如， [0,1,2
//,4,5,6,7] 在下标 3 处经旋转后可能变为 [4,5,6,7,0,1,2] 。
//
// 给你 旋转后 的数组 nums 和一个整数 target ，如果 nums 中存在这个目标值 target ，则返回它的下标，否则返回 -1 。
//
//
//
// 示例 1：
//
//
//输入：nums = [4,5,6,7,0,1,2], target = 0
//输出：4
//
//
// 示例 2：
//
//
//输入：nums = [4,5,6,7,0,1,2], target = 3
//输出：-1
//
// 示例 3：
//
//
//输入：nums = [1], target = 0
//输出：-1
//
//
//
//
// 提示：
//
//
// 1 <= nums.length <= 5000
// -10^4 <= nums[i] <= 10^4
// nums 中的每个值都 独一无二
// 题目数据保证 nums 在预先未知的某个下标上进行了旋转
// -10^4 <= target <= 10^4
//
//
//
//
// 进阶：你可以设计一个时间复杂度为 O(log n) 的解决方案吗？
// Related Topics 数组 二分查找
// 👍 1392 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     *
     * @return Integer
     */
    public function search($nums, $target)
    {
        $low = 0;
        $high = count($nums) - 1;

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            // TODO:how to judge the direct
            if ($nums[$mid] == $target) {
                return $mid;
            }

            if ($low == $high) {
                return -1;
            }
            if (($target > $nums[$high]) && ($target < $nums[$low])) {
                if ($target < $nums[$low]) {
                    return -1;
                }
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->search([4, 5, 6, 7, 0, 1, 2], 0) . PHP_EOL;
//echo (new Solution())->search([4,5,6,7,0,1,2], 3).PHP_EOL;
