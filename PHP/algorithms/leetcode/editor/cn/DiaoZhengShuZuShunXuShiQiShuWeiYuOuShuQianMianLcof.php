<?php

namespace Algorithms\leetcode\editor\cn;

//输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有奇数位于数组的前半部分，所有偶数位于数组的后半部分。
//
// 示例： 输入：nums = [1,2,3,4] 输出：[1,3,2,4]
//注：[3,1,2,4] 也是正确的答案之一。
//
// 提示：
// 0 <= nums.length <= 50000
// 1 <= nums[i] <= 10000

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[]
     */
    public function exchange($nums)
    {
        $count = count($nums);
        $i = 0;
        $j = $count - 1;

        while ($i < $j) {
            if ($nums[$i] % 2 == 1) {
                $i++;
                continue;
            } else {
                $tmp = $nums[$j];
                $nums[$j--] = $nums[$i];
                $nums[$i] = $tmp;
            }

            if ($nums[$j] % 2 == 0) {
                $j--;
                continue;
            } else {
                $tmp = $nums[$i];
                $nums[$i++] = $nums[$j];
                $nums[$j] = $tmp;
            }
        }

        return $nums;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
