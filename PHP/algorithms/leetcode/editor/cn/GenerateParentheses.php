<?php

namespace Algorithms\leetcode\editor\cn;

//数字 n 代表生成括号的对数，请你设计一个函数，用于能够生成所有可能的并且 有效的 括号组合。
//
// 示例 1：
//输入：n = 3
//输出：["((()))","(()())","(())()","()(())","()()()"]
//
// 示例 2：
//输入：n = 1
//输出：["()"]
//
// 提示：
// 1 <= n <= 8
//
// Related Topics 字符串 动态规划 回溯

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $n
     * @return String[]
     */
    private $result = [];

    public function generateParenthesis($n)
    {
        $this->backTrack($n, 0, 0, '');

        return $this->result;
    }

    public function backTrack($n, $leftCount, $rightCount, $res)
    {
        if (strlen($res) == 2 * $n) {
            $this->result[] = $res;
            return;
        }

        if ($leftCount < $n) {
            $this->backTrack($n, $leftCount + 1, $rightCount, $res . '(');
        }
        if ($leftCount > $rightCount) {
            $this->backTrack($n, $leftCount, $rightCount + 1, $res . ')');
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
