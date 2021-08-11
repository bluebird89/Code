<?php

namespace Algorithms\leetcode\editor\cn;

//请实现一个函数，把字符串 s 中的每个空格替换成"%20"。
//
//
//
// 示例 1：
//
// 输入：s = "We are happy."
//输出："We%20are%20happy."
//
//
//
// 限制：
//
// 0 <= s 的长度 <= 10000
// 👍 117 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    /**
     * 查找空格 拼接
     */
    /**
     * @param  String  $s
     *
     * @return String
     */
    public static function replaceSpace($s)
    {
        if ($s == '') {
            return '';
        }

        $res = '';
        while (!empty($pos = strpos($s, ' '))) {
            echo $pos;
            $res .= substr($s, 0, $pos).'%20';
            $s = substr($s, $pos + 1);
        }
        $res .= $s;

        return $res;
    }

    /**
     * 查找空格 拼接
     */
    /**
     * @param  String  $s
     *
     * @return String
     */
    public static function replaceSpace_1($s)
    {
        if ($s == '') {
            return '';
        }
        $res = '';
        // TODO:var_dump(Solution::replaceSpace("     "));
        $tok = strtok($s, " ");
        $res .= $tok;
        while ($tok = strtok(" ")) {
            $res .= '%20'.$tok;
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
//var_dump(Solution::replaceSpace("We are happy."));
var_dump(Solution::replaceSpace("     "));
