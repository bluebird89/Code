<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个整数 n 和 k，返回 1 ... n 中所有可能的 k 个数的组合。
//
// 示例:
//
// 输入: n = 4, k = 2
//输出:
//[
//  [2,4],
//  [3,4],
//  [2,3],
//  [1,2],
//  [1,3],
//  [1,4],
//]
// Related Topics 数组 回溯

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    private $result = [];

    public function combine($n, $k)
    {
        $this->backTrack($n, $k, 1, []);

        return $this->result;
    }

    public function backTrack($n, $k, $start, $arr)
    {
        if (0 == $k) {
            $this->result[] = $arr;
            return;
        }

        for ($i = $start; $i <= $n - $k + 1; $i++) {
            $arr[] = $i;
            $this->backTrack($n, $k - 1, $i + 1, $arr);
            array_pop($arr);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
