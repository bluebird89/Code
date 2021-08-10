<?php

namespace Algorithms\leetcode\editor\cn;

//设计一个算法，找出数组中两数之和为指定值的所有整数对。一个数只能属于一个数对。
//
// 示例 1:
//
// 输入: nums = [5,6,5], target = 11
//输出: [[5,6]]
//
// 示例 2:
//
// 输入: nums = [5,6,5,6], target = 11
//输出: [[5,6],[5,6]]
//
// 提示：
//
//
// nums.length <= 100000
//
// Related Topics 数组 哈希表 双指针 计数 排序
// 👍 28 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    public function pairSums($nums, $target)
    {
        sort($nums);
        $res = [];
        $len = count($nums);
        $begin = 0;
        $end = $len - 1;

        while ($begin < $end) {
            $sum = $nums[$begin] + $nums[$end];
            if ($sum == $target) {
                $res[] = [$nums[$begin], $nums[$end]];
                $begin++;
                $end--;
            } elseif ($sum < $target) {
                $begin++;
            } else {
                $end--;
            }
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
