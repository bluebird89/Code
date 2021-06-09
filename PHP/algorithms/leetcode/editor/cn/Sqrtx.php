<?php

namespace Algorithms\leetcode\editor\cn;

//实现 int sqrt(int x) 函数。
//
// 计算并返回 x 的平方根，其中 x 是非负整数。
//
// 由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。
//
// 示例 1:
//
// 输入: 4
//输出: 2
//
//
// 示例 2:
//
// 输入: 8
//输出: 2
//说明: 8 的平方根是 2.82842...,
//     由于返回类型是整数，小数部分将被舍去。
//
// Related Topics 数学 二分查找
// 👍 690 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer  $x
     *
     * @return Integer
     */
    public function mySqrt($x)
    {
        if ($x == 0) {
            return 0;
        }

        $low = 0;
        $high = $x;

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            $midSqure = $mid * $mid;

            if ($midSqure == $x) {
                return $mid;
            } elseif ($midSqure < $x) {
                // 转化逻辑判读
                $midPlusSqure = ($mid + 1) * ($mid + 1);
                if ($midPlusSqure <= $x) {
                    $low = $mid + 1;
                } else {
                    return $mid;
                }
            } else {
                $high = $mid - 1;
            }
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->mySqrt(4).PHP_EOL;
echo (new Solution())->mySqrt(8).PHP_EOL;
