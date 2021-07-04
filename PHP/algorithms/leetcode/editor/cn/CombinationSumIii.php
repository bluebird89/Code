<?php

namespace Algorithms\leetcode\editor\cn;

//找出所有相加之和为 n 的 k 个数的组合。组合中只允许含有 1 - 9 的正整数，并且每种组合中不存在重复的数字。
//
// 说明：
//
//
// 所有数字都是正整数。
// 解集不能包含重复的组合。
//
//
// 示例 1:
//
// 输入: k = 3, n = 7
//输出: [[1,2,4]]
//
//
// 示例 2:
//
// 输入: k = 3, n = 9
//输出: [[1,2,6], [1,3,5], [2,3,4]]
//
// Related Topics 数组 回溯
// 👍 318 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    private $result = [];

    public function combinationSum3($k, $n)
    {
        sort($candidates);
        $this->backTrack($k, $n, 1, []);

        return $this->result;
    }

    public function backTrack($count, $target, $begin, $arr)
    {
        if ($count == 0) {
            if (array_sum($arr) == $target) {
                $this->result[] = $arr;
            }
            return;
        }

        for ($i = $begin; $i < 10; $i++) {
            if ($target - $i < 0) {
                break;
            }
            $arr[] = $i;
            $this->backTrack($count - 1, $target, $i + 1, $arr);
            array_pop($arr);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
