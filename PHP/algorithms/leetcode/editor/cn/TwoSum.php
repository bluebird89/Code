<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个整数数组 nums 和一个整数目标值 target，请你在该数组中找出 和为目标值 的那 两个 整数，并返回它们的数组下标。
//
// 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素在答案里不能重复出现。
//
// 你可以按任意顺序返回答案。
//
//
//
// 示例 1：
//
//
//输入：nums = [2,7,11,15], target = 9
//输出：[0,1]
//解释：因为 nums[0] + nums[1] == 9 ，返回 [0, 1] 。
//
//
// 示例 2：
//
//
//输入：nums = [3,2,4], target = 6
//输出：[1,2]
//
//
// 示例 3：
//
//
//输入：nums = [3,3], target = 6
//输出：[0,1]
//
//
//
//
// 提示：
//
//
// 2 <= nums.length <= 103
// -109 <= nums[i] <= 109
// -109 <= target <= 109
// 只会存在一个有效答案
//
// Related Topics 数组 哈希表
// 👍 11127 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

class Solution
{

    /**
     * 遍历
     *
     * @param Integer[] $nums
     * @param Integer $target
     *
     * @return Integer[]
     */
    public function twoSum1(array $nums, int $target): array
    {
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if ($nums[$j] == $target - $nums[$i]) {
                    return [$i, $j];
                }
            }
        }

        return [0, 0];
    }

    public function twoSum2(array $nums, int $target): array
    {
        $map = [];
        foreach ($nums as $k => $v) {
            $map[$v][] = $k;
        }

        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            $res = $target - $nums[$i];
            if (isset($map[$res]) && $res != $nums[$i]) {
                return [$map[$nums[$i]][0], $map[$res][0]];
            } else {
                if (sizeof($map[$res]) > 1) {
                    return [$map[$res][0], $map[$res][1]];
                }
            }
        }
        return [0, 0];
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     *
     * @return Integer[]
     */
    public function twoSum3($nums, $target)
    {
        $found = [];
        $count = count($nums);

        for ($i = 0; $i < $count; $i++) {
            $diff = $target - $nums[$i];

            if (array_key_exists($diff, $found)) {
                return [$found[$diff], $i];
            }

            $found[$nums[$i]] = $i;
        }
    }

    /**
     * hash table:fix value cooruption
     *
     * @param array $nums
     * @param int $target
     *
     * @return array|int[]
     */
    public function twoSum(array $nums, int $target): array
    {
        $map = [];
        foreach ($nums as $k => $v) {
            $res = $target - $nums[$k];
            if (isset($map[$res])) {
                return [$k, $map[$res][0]];
            }
            $map[$v][] = $k;
        }

        return [0, 0];
    }
}

//leetcode submit region end(Prohibit modification and deletion)

echo array_search(3, [3, 3], true) . PHP_EOL;
print_r((new Solution())->twoSum([3, 2, 3], 6));
print_r((new Solution())->twoSum([2, 7, 11, 15], 9));
