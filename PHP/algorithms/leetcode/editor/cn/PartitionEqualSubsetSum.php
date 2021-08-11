<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个 只包含正整数 的 非空 数组 nums 。请你判断是否可以将这个数组分割成两个子集，使得两个子集的元素和相等。
//
//
//
// 示例 1：
//
//
//输入：nums = [1,5,11,5]
//输出：true
//解释：数组可以分割成 [1, 5, 5] 和 [11] 。
//
// 示例 2：
//
//
//输入：nums = [1,2,3,5]
//输出：false
//解释：数组不能分割成两个元素和相等的子集。
//
//
//
//
// 提示：
//
//
// 1 <= nums.length <= 200
// 1 <= nums[i] <= 100
//
// Related Topics 数组 动态规划

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public function canPartition1($nums)
    {
        $len = count($nums);
        if ($len == 1) {
            return false;
        }
        $target = array_sum($nums) / 2;
        if ($target != floor($target)) {
            return false;
        }
        $dp = array_fill(0, $len, array_fill(0, $target + 1, false));

        if ($nums[0] <= $target) {
            $dp[0][$nums[0]] = true;
        }
        for ($i = 1; $i < $len; $i++) {
            for ($j = 0; $j <= $target; $j++) {
                $dp[$i][$j] = $dp[$i - 1][$j];

                if ($nums[$i] == $j) {
                    $dp[$i][$j] = true;
                    continue;
                }
                if ($j > $nums[$i]) {
                    $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i - 1][$j - $nums[$i]];
                }
            }
        }

        return $dp[$len - 1][$target];
    }

    /*
     * dp[0][0] = true
     * $nums[$i] can be a seperate
     */
    public function canPartition($nums)
    {
        $len = count($nums);
        if ($len == 1) {
            return false;
        }
        $target = array_sum($nums) / 2;
        if ($target != floor($target)) {
            return false;
        }
        $dp = array_fill(0, $len, array_fill(0, $target + 1, false));

        $dp[0][0] = true;

        if ($nums[0] <= $target) {
            $dp[0][$nums[0]] = true;
        }
        for ($i = 1; $i < $len; $i++) {
            for ($j = 0; $j <= $target; $j++) {
                $dp[$i][$j] = $dp[$i - 1][$j];
                if ($j > $nums[$i]) {
                    $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i - 1][$j - $nums[$i]];
                }
                if ($dp[$i][$target]) {
                    return true;
                }
            }
        }

        return $dp[$len - 1][$target];
    }

    public function canPartition2($nums)
    {
        $len = count($nums);
        if ($len == 1) {
            return false;
        }
        $target = array_sum($nums) / 2;
        if ($target != floor($target)) {
            return false;
        }
        $dp = array_fill(0, $target + 1, false);

        if ($nums[0] <= $target) {
            $dp[$nums[0]] = true;
        }
        for ($i = 1; $i < $len; $i++) {
            for ($j = $target; $j >= $nums[$i]; $j--) {
                if ($dp[$target]) {
                    return true;
                }

                $dp[$j] = $dp[$j] || $dp[$j - $nums[$i]];
            }
        }

        return $dp[$target];
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump((new Solution())->canPartition([2, 2, 1, 1]));
