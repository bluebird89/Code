<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。
//
// 说明：本题中，我们将空字符串定义为有效的回文串。
//
// 示例 1:
//
// 输入: "A man, a plan, a canal: Panama"
//输出: true
//
//
// 示例 2:
//
// 输入: "race a car"
//输出: false
//
// Related Topics 双指针 字符串
// 👍 383 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  String  $s
     *
     * @return Boolean
     */
    public static function isPalindrome($s)
    {
        $s = preg_replace('/[\W|_]/', '', strtolower($s));
        echo $s;
        $l_pointer = 0;
        $r_pointer = strlen($s) - 1;
        if (strlen($s) == 1) {
            return true;
        }
        while ($l_pointer < $r_pointer) {
            if ($s[$l_pointer] != $s[$r_pointer]) {
                return false;
            }
            $l_pointer++;
            $r_pointer--;
        }
        return true;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r(Solution::isPalindrome("A man, a plan, a canal: Panama"));
var_dump(Solution::isPalindrome("race a car"));
var_dump(Solution::isPalindrome("a."));
var_dump(Solution::isPalindrome("ab_a"));
