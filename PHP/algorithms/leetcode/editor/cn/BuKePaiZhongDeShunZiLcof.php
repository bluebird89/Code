<?php

namespace Algorithms\leetcode\editor\cn;

//从扑克牌中随机抽5张牌，判断是不是一个顺子，即这5张牌是不是连续的。2～10为数字本身，A为1，J为11，Q为12，K为13，而大、小王为 0 ，可以看成任
//意数字。A 不能视为 14。
//
//
//
// 示例 1:
//
// 输入: [1,2,3,4,5]
//输出: True
//
//
//
// 示例 2:
//
// 输入: [0,0,1,2,5]
//输出: True
//
//
//
// 限制：
//
// 数组长度为 5
//
// 数组的数取值为 [0, 13] .
// 👍 131 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Class Solution
 *
 * @package Algorithms\leetcode\editor\cn
 *
 * 3 <= max-min <=5
 * false:相同数字
 */
class Solution
{

    /**
     * @param  Integer[]  $nums
     *
     * @return Boolean
     */
    public static function isStraight($nums)
    {
        // 初始值边界
        $min = 14;
        $max = 0;
//        $count = count($nums);
        $count = 5;
        for ($i = 0; $i < $count; $i++) {
            if ($nums[$i] != 0) {
                // 相同数字返回 false
                for ($j = $i + 1; $j < $count; $j++) {
                    if ($nums[$i] == $nums[$j]) {
                        return false;
                    }
                }
                $max = $max > $nums[$i] ? $max : $nums[$i];
                $min = $min < $nums[$i] ? $min : $nums[$i];
            }
        }

        return $max - $min < $count;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump(Solution::isStraight([0, 0, 2, 2, 5]));
var_dump(Solution::isStraight([1, 2, 3, 4, 5]));
var_dump(Solution::isStraight([0, 0, 1, 2, 5]));
var_dump(Solution::isStraight([11, 8, 12, 8, 10]));
