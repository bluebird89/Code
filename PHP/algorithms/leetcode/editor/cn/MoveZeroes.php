<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
//
// 示例:
//
// 输入: [0,1,0,3,12]
//输出: [1,3,12,0,0]
//
// 说明:
//
//
// 必须在原数组上操作，不能拷贝额外的数组。
// 尽量减少操作次数。
//
// Related Topics 数组 双指针
// 👍 1143 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function moveZeroes(&$nums)
    {
        $len = count($nums);
        $begin = 0;
        $end = $len - 1;

        while ($begin < $end) {
            while ($nums[$end] == 0 && $nums[--$end] == 0);

            if ($nums[$begin] == 0) {
                $i = $begin;
                while ($i < $end) {
                    $nums[$i] = $nums[$i + 1];
                    $i++;
                }
                $nums[$end] = 0;
                $begin++;
                $end--;
            }
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
