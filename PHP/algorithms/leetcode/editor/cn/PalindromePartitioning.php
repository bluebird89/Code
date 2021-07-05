<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个字符串 s，请你将 s 分割成一些子串，使每个子串都是 回文串 。返回 s 所有可能的分割方案。
//
// 回文串 是正着读和反着读都一样的字符串。
//
//
//
// 示例 1：
//
//
//输入：s = "aab"
//输出：[["a","a","b"],["aa","b"]]
//
//
// 示例 2：
//
//
//输入：s = "a"
//输出：[["a"]]
//
//
//
//
// 提示：
//
//
// 1 <= s.length <= 16
// s 仅由小写英文字母组成
//
// Related Topics 字符串 动态规划 回溯

//leetcode submit region begin(Prohibit modification and deletion)

class Solution
{

    /**
     * @param String $s
     * @return String[][]
     */
    private $result = [];

    public function partition($s)
    {
        if (empty($s)) {
            return $this->result;
        }
        $sub = [];
        $this->backTrack($s, 0, $sub);

        return $this->result;
    }

    public function backTrack(&$s, $index, &$sub)
    {
        $count = strlen($s);

        if ($index == $count) {
            $this->result[] = $sub;
            var_dump($sub);
            return;
        }

        for ($i = 1; $i < $count; $i++) {
            $str = substr($s, 0, $i);
            echo $str . $i . PHP_EOL;
            if ($this->isPalindrome($str)) {
                $sub[] = $str;
                $res = substr($s, $i+1);
                $this->backTrack($res, $i + 1, $sub);
                array_pop($sub);
            }
        }
    }

    public function isPalindrome($s)
    {
        $count = strlen($s);
        if ($count == 1) {
            return true;
        }
        if ($count == 0) {
            return false;
        }

        $start = 0;
        $end = $count - 1;
        while ($start < $end) {
            if ($s[$start] != $s[$end]) {
                return false;
            }

            $start++;
            $end--;
        }

        return true;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump((new Solution())->partition('aab'));
