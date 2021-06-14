<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个数组，编写一个函数来计算它们的交集。
//
//
//
// 示例 1：
//
// 输入：nums1 = [1,2,2,1], nums2 = [2,2]
//输出：[2]
//
//
// 示例 2：
//
// 输入：nums1 = [4,9,5], nums2 = [9,4,9,8,4]
//输出：[9,4]
//
//
//
// 说明：
//
//
// 输出结果中的每个元素一定是唯一的。
// 我们可以不考虑输出结果的顺序。
//
// Related Topics 排序 哈希表 双指针 二分查找
// 👍 375 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function intersection($nums1, $nums2)
    {
        $res = [];
        foreach ($nums1 as $num) {
            if (in_array($num, $nums2) && !in_array($num, $res)) {
                $res[] = $num;
            }
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
