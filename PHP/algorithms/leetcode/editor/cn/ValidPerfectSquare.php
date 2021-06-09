<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个 正整数 num ，编写一个函数，如果 num 是一个完全平方数，则返回 true ，否则返回 false 。
//
// 进阶：不要 使用任何内置的库函数，如 sqrt 。
//
//
//
// 示例 1：
//
//
//输入：num = 16
//输出：true
//
//
// 示例 2：
//
//
//输入：num = 14
//输出：false
//
//
//
//
// 提示：
//
//
// 1 <= num <= 2^31 - 1
//
// Related Topics 数学 二分查找
// 👍 223 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer  $num
     *
     * @return Boolean
     */
    public function isPerfectSquare($num)
    {
        if ($num == 1) {
            return true;
        }
        $low = 1;
        $high = $num - 1;
        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            $res = $mid * $mid;
            echo $mid.PHP_EOL;
            if ($res == $num) {
                return true;
            }

            if ($res < $num) {
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }
        return false;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump((new Solution())->isPerfectSquare(16));
