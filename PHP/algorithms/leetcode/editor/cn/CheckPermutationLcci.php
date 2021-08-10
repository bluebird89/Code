<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个字符串 s1 和 s2，请编写一个程序，确定其中一个字符串的字符重新排列后，能否变成另一个字符串。
//
// 示例 1：
//
// 输入: s1 = "abc", s2 = "bca"
//输出: true
//
//
// 示例 2：
//
// 输入: s1 = "abc", s2 = "bad"
//输出: false
//
//
// 说明：
//
//
// 0 <= len(s1) <= 100
// 0 <= len(s2) <= 100
//
// Related Topics 哈希表 字符串 排序
// 👍 38 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    public function CheckPermutation($s1, $s2)
    {
        $s1_len = strlen($s1);
        $s2_len = strlen($s2);
        if ($s1_len != $s2_len) {
            return false;
        }
        $res = [];
        for ($i = 0; $i < $s1_len; $i++) {
            // serach begin last index+1
            $offset = isset($res[$s1[$i]]) ? $res[$s1[$i]] + 1 : 0;
            $index = strpos($s2, $s1[$i], $offset);

            if ($index === false) {
                return false;
            }

            $res[$s1[$i]] = $index;
        }

        return true;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
