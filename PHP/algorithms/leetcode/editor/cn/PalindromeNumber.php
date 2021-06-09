<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个整数 x ，如果 x 是一个回文整数，返回 true ；否则，返回 false 。
//
// 回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。例如，121 是回文，而 123 不是。
//
//
//
// 示例 1：
//
//
//输入：x = 121
//输出：true
//
//
// 示例 2：
//
//
//输入：x = -121
//输出：false
//解释：从左向右读, 为 -121 。 从右向左读, 为 121- 。因此它不是一个回文数。
//
//
// 示例 3：
//
//
//输入：x = 10
//输出：false
//解释：从右向左读, 为 01 。因此它不是一个回文数。
//
//
// 示例 4：
//
//
//输入：x = -101
//输出：false
//
//
//
//
// 提示：
//
//
// -231 <= x <= 231 - 1
//
//
//
//
// 进阶：你能不将整数转为字符串来解决这个问题吗？
// Related Topics 数学
// 👍 1510 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    /**
     * 转变字符处理
     *
     * @param  Integer  $x
     *
     * @return Boolean
     */
    public static function isPalindrome($x)
    {
        $str = (string) $x;
        $count = strlen($str);

        for ($i = 0; $i < $count / 2; $i++) {
            if ($str[$i] != $str[$count - $i - 1]) {
                return false;
            }
        }
        return true;
    }

    /**
     *
     * // TODO:余数
     * //    - 翻转
     * //    - 处理数据
     * //
     *
     * @param  Integer  $x
     *
     * @return Boolean
     */
    public static function isPalindrome1($x)
    {
        $str = (string) ($x + 0);
        $count = strlen($str);
        if ($x < 0) {
            return false;
        }

        if ($x >= 0 && $x < 10) {
            return true;
        }

        for ($i = 0; $i < max(1, $count / 2); $i++) {
            // left digit
            $divide = pow(10, $count - $i - 1);
            $left = (int) ($x / $divide);
            $x %= $divide;

            // left digit
            $divide = pow(10, $i + 1);
            $right = $x % $divide;

            echo $left.'_'.$right.'_'.$x.PHP_EOL;
            if ($left != $right) {
                return false;
            }

            $x = (int) ($x / $divide);
            if ($x >= 0 && $x < 10) {
                return true;
            }
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)

var_dump(Solution::isPalindrome(-121));
var_dump(Solution::isPalindrome(121));
var_dump(Solution::isPalindrome(10));
var_dump(Solution::isPalindrome(11));
var_dump(Solution::isPalindrome(21));
var_dump(Solution::isPalindrome(1000021));
