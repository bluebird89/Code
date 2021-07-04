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
     */
    public function threeSum($nums)
    {
        sort($nums);
        $res = [];
        $count = count($nums);
        for ($i = 0; $i < $count - 2; $i++) {
            if (isset($nums[$i - 1]) && ($nums[$i] == $nums[$i - 1])) {
                continue;
            }
            for ($j = $i + 1; $j < $count - 1; $j++) {
                if ($nums[$j] == $nums[$i]) {
                    continue;
                }
                for ($k = $j + 1; $k < $count; $k++) {
//                    if ($nums[$k] == $nums[$k-1]) {
//                        continue;
//                    }
                    if (($nums[$i] + $nums[$j] + $nums[$k]) == 0) {
                        $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                    }
                }
            }
        }

        return $res;
    }

//    public function threeSum($nums)
//    {
//
//    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r((new Solution())->threeSum([-1, 0, 1, 2, -1, -4]));
print_r((new Solution())->threeSum([0, 0, 0, 0]));
