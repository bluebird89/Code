<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个整数数组，请交换一对数值（每个数组中取一个数值），使得两个数组所有元素的和相等。
//
// 返回一个数组，第一个元素是第一个数组中要交换的元素，第二个元素是第二个数组中要交换的元素。若有多个答案，返回任意一个均可。若无满足条件的数值，返回空数组。
//
//
// 示例:
//
// 输入: array1 = [4, 1, 2, 1, 1, 2], array2 = [3, 6, 3, 3]
//输出: [1, 3]
//
//
// 示例:
//
// 输入: array1 = [1, 2, 3], array2 = [4, 5, 6]
//输出: []
//
// 提示：
//
//
// 1 <= array1.length, array2.length <= 100000
//
// Related Topics 排序 数组
// 👍 24 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $array1
     * @param Integer[] $array2
     *
     * @return Integer[]
     * @deprecated
     */
    public function findSwapValues1($array1, $array2)
    {
        $arr1_sum = array_sum($array1);
        $arr2_sum = array_sum($array2);
        $diff = ($arr1_sum - $arr2_sum) / 2;

        foreach ($array2 as $k => $v) {
            if (in_array($v + $diff, $array1)) {
                return [$v + $diff, $v];
            }
        }

        return [];
    }

    public function findSwapValues($array1, $array2)
    {
        $arr1_sum = 0;
        $hash = [];
        foreach ($array1 as $value) {
            $arr1_sum += $value;
            if (!isset($hash[$value])) {
                $hash[$value] = 1;
            }
        }
        $arr2_sum = array_sum($array2);
        $diff = ($arr1_sum - $arr2_sum) / 2;
        if (floor($diff) != $diff) {
            return [];
        }

        foreach ($array2 as $k => $v) {
            if (isset($hash[$v + $diff])) {
                return [$v + $diff, $v];
            }
        }

        return [];
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r((new Solution())->findSwapValues([4, 1, 2, 1, 1, 2], [3, 6, 3, 3]));
print_r((new Solution())->findSwapValues([1, 2, 3], [4, 5, 6]));
print_r((new Solution())->findSwapValues(
    [519, 886, 282, 382, 662, 4718, 258, 719, 494, 795],
    [52, 20, 78, 50, 38, 96, 81, 20]
));
var_dump(in_array(5, [3, 5, 7, 9]));
