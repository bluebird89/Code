<?php

namespace Algorithms\leetcode\editor\cn;

//字符串有三种编辑操作:插入一个字符、删除一个字符或者替换一个字符。 给定两个字符串，编写一个函数判定它们是否只需要一次(或者零次)编辑。
//
//
//
// 示例 1:
//
// 输入:
//first = "pale"
//second = "ple"
//输出: True
//
//
//
// 示例 2:
//
// 输入:
//first = "pales"
//second = "pal"
//输出: False
//
// Related Topics 字符串 动态规划
// 👍 71 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  String  $first
     * @param  String  $second
     *
     * @return bool
     */
    public static function oneEditAway($first, $second)
    {
        $first_len = strlen($first);
        $second_len = strlen($second);

        if (abs($first_len - $second_len) > 1) {
            return false;
            // 替换
        } elseif ($first_len == $second_len) {
            $count = 0;
            for ($i = 0; $i < $first_len; $i++) {
                if ($first[$i] != $second[$i]) {
                    $count++;
                }
                if ($count > 1) {
                    return false;
                }
            }
            return true;
            // 插入|删除
        } elseif (abs($first_len - $second_len) == 1) {
            $long = $first_len > $second_len ? $first : $second;
            $short = $first_len < $second_len ? $first : $second;
            $long_count = strlen($long);
            $diff_index = -1;
            for ($i = 0; $i < $long_count - 1; $i++) {
                if ($long[$i] != $short[$i]) {
                    $diff_index = $i;
                }
                if ($diff_index >= 0 && ($long[$i + 1] != $short[$i])) {
                    return false;
                }
            }
            return true;
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump(Solution::oneEditAway("pale", "ple"));
var_dump(Solution::oneEditAway("pales", "pal"));
var_dump(Solution::oneEditAway("teacher", "bleacher"));
