<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有和为 0 且不重
//复的三元组。
//
// 注意：答案中不可以包含重复的三元组。
//
//
//
// 示例 1：
//
//
//输入：nums = [-1,0,1,2,-1,-4]
//输出：[[-1,-1,2],[-1,0,1]]
//
//
// 示例 2：
//
//
//输入：nums = []
//输出：[]
//
//
// 示例 3：
//
//
//输入：nums = [0]
//输出：[]
//
//
//
//
// 提示：
//
//
// 0 <= nums.length <= 3000
// -105 <= nums[i] <= 105
//
// Related Topics 数组 双指针
// 👍 3407 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[][]
     * @deprecated
     */
    public function threeSum1($nums)
    {
        sort($nums);
        $reses = [];
        $count = count($nums);
        if ($count === 0) {
            return [];
        }

        for ($i = 0; $i < $count - 2; $i++) {
            for ($j = $i + 1; $j < $count - 1; $j++) {
                for ($k = $j + 1; $k < $count; $k++) {
                    if ($nums[$k] == -$nums[$i] - $nums[$j]) {
                        $res = [$nums[$i], $nums[$j], $nums[$k]];
                        sort($res);
                        if (!in_array($res, $reses)) {
                            $reses[] = $res;
                        }
                    }
                }
            }
        }

        return $reses;
    }

    public function threeSum($nums)
    {
        $res = [];
        sort($nums);
        $len = count($nums);

        for ($i = 0; $i < $len - 2; $i++) {
            if ($nums[$i] > 0) {
                break;
            }
            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            $start = $i + 1;
            $end = $len - 1;
            while ($start < $end) {
                $sum = $nums[$i] + $nums[$start] + $nums[$end];

                if ($sum > 0) {
                    while ($start < $end && $nums[$end] == $nums[--$end]);
                } elseif ($sum < 0) {
                    while ($start < $end && $nums[$start] == $nums[++$start]);
                } else {
                    $res[] = [$nums[$i], $nums[$start], $nums[$end]];
                    while ($start < $end && $nums[$start] == $nums[++$start]);
                    while ($start < $end && $nums[$end] == $nums[--$end]);
                }
            }
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r((new Solution())->threeSum([-1, 0, 1, 2, -1, -4]));
print_r((new Solution())->threeSum([1, 2, -2, -1]));
print_r((new Solution())->threeSum([-1, 0, 1, 0]));
