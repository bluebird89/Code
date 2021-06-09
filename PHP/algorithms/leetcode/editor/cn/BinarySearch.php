<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个 n 个元素有序的（升序）整型数组 nums 和一个目标值 target ，写一个函数搜索 nums 中的 target，如果目标值存在返回下标，否
//则返回 -1。
//
//
//示例 1:
//
// 输入: nums = [-1,0,3,5,9,12], target = 9
//输出: 4
//解释: 9 出现在 nums 中并且下标为 4
//
//
// 示例 2:
//
// 输入: nums = [-1,0,3,5,9,12], target = 2
//输出: -1
//解释: 2 不存在 nums 中因此返回 -1
//
//
//
//
// 提示：
//
//
// 你可以假设 nums 中的所有元素是不重复的。
// n 将在 [1, 10000]之间。
// nums 的每个元素都将在 [-9999, 9999]之间。
//
// Related Topics 二分查找
// 👍 248 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[]  $nums
     * @param  Integer    $target
     *
     * @return Integer
     */
    public function search1($nums, $target)
    {
        $low = 0;
        $high = count($nums);

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            if ($nums[$mid] == $target) {
                return $mid;
            }

            if ($nums[$mid] > $target) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }

    public function search($nums, $target)
    {
        return $this->search_r($nums, 0, count($nums), $target);
    }

    /**
     * @param $nums
     * @param $low
     * @param $high
     * @param $target
     *
     * @return false|float
     */
    private function search_r($nums, $low, $high, $target)
    {
        if ($low > $high) {
            return -1;
        }

        $mid = $low + floor(($high - $low) / 2);
        if ($nums[$mid] == $target) {
            return $mid;
        }

        if ($nums[$mid] > $target) {
            return $this->search_r($nums, $low, $mid - 1, $target);
        } else {
            return $this->search_r($nums, $mid + 1, $high, $target);
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->search([-1, 0, 3, 5, 9, 12], 2).PHP_EOL;
echo (new Solution())->search([-1, 0, 3, 5, 9, 12], 9).PHP_EOL;
echo (new Solution())->search([5], 5).PHP_EOL;
