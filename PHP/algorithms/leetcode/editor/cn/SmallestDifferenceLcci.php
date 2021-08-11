<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个整数数组a和b，计算具有最小差绝对值的一对数值（每个数组中取一个值），并返回该对数值的差
//
//
//
// 示例：
//
//
//输入：{1, 3, 15, 11, 2}, {23, 127, 235, 19, 8}
//输出：3，即数值对(11, 8)
//
//
//
//
// 提示：
//
//
// 1 <= a.length, b.length <= 100000
// -2147483648 <= a[i], b[i] <= 2147483647
// 正确结果在区间 [0, 2147483647] 内
//
// Related Topics 数组 双指针 二分查找 排序
// 👍 38 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $a
     * @param Integer[] $b
     * @return Integer
     */
    function smallestDifference($a, $b)
    {
        sort($a);
        sort($b);
        $a_len = count($a);
        $b_len = count($b);

        if ($a[0] >= $b[$b_len - 1]) {
            return $a[0] - $b[$b_len - 1];
        }

        if ($b[0] >= $a[$a_len - 1]) {
            return $b[0] - $a[$a_len - 1];
        }

        $i = 0;
        $j = 0;
        $minPath = PHP_INT_MAX;
        while ($i < $a_len && $j < $b_len) {
            $diff = $a[$i] - $b[$j];
            $minPath = min(abs($diff), $minPath);

            if ($a[$i] > $b[$j]) {
                $j++;
            } else {
                $i++;
            }
        }

        return $minPath;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump((new Solution())->smallestDifference([-2147483648, 1], [2147483647, 0]));
var_dump((new Solution())->smallestDifference([1, 2, 11, 15], [4, 12, 19, 23, 127, 235]));
