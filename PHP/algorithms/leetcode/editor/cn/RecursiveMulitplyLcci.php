<?php

namespace Algorithms\leetcode\editor\cn;

//递归乘法。 写一个递归函数，不使用 * 运算符， 实现两个正整数的相乘。可以使用加号、减号、位移，但要吝啬一些。
//
// 示例1:
//
//
// 输入：A = 1, B = 10
// 输出：10
//
//
// 示例2:
//
//
// 输入：A = 3, B = 4
// 输出：12
//
//
// 提示:
//
//
// 保证乘法范围不会溢出
//
// Related Topics 递归
// 👍 43 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * TODO: 将大值转化为 2^n + m:指数通过位移实现
     *
     * @param  Integer  $A
     * @param  Integer  $B
     *
     * @return Integer
     */
    public function multiply1($A, $B)
    {
    }

    /**
     * 将大值转化为 2^n + m:指数通过位移实现
     *
     * @param  Integer  $A
     * @param  Integer  $B
     *
     * @return Integer
     */
    public function multiply($A, $B)
    {
        if ($A == 0 || $B == 0) {
            return 0;
        }

        $max = $A > $B ? $A : $B;
        $min = $A <= $B ? $A : $B;

        return $max + $this->multiply($max, $min - 1);
    }
}

//leetcode submit region end(Prohibit modification and deletion)
//echo 1 << 2;
echo (new Solution())->multiply(1, 10).PHP_EOL;
echo (new Solution())->multiply(3, 4);
