<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
//
// 示例 1:  输入: s = "anagram", t = "nagaram" 输出: true
//
// 示例 2: 输入: s = "rat", t = "car" 输出: false
//
// 说明: 可以假设字符串只包含小写字母。
//
// 进阶: 如果输入字符串包含 unicode 字符怎么办？你能否调整你的解法来应对这种情况？

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isAnagram($s, $t)
    {
        $s_len = strlen($s);
        $t_len = strlen($t);
        if ($s_len != $t_len) {
            return false;
        }

        $res = [];
        for ($i = 0; $i < $s_len; $i++) {
            $offset = isset($res[$s[$i]]) ? $res[$s[$i]] + 1 : 0;
            $index = strpos($t, $s[$i], $offset);

            if ($index === false) {
                return false;
            }

            $res[$s[$i]] = $index;
        }

        return true;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump(strpos('car', 't'));
var_dump(0 == false);
