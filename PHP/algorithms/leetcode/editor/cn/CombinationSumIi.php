<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。
//
// candidates 中的每个数字在每个组合中只能使用一次。
//
// 说明：
//
//
// 所有数字（包括目标数）都是正整数。
// 解集不能包含重复的组合。
//
//
// 示例 1:
//
// 输入: candidates = [10,1,2,7,6,1,5], target = 8,
//所求解集为:
//[
//  [1, 7],
//  [1, 2, 5],
//  [2, 6],
//  [1, 1, 6]
//]
//
//
// 示例 2:
//
// 输入: candidates = [2,5,2,1,2], target = 5,
//所求解集为:
//[
//  [1,2,2],
//  [5]
//]
// Related Topics 数组 回溯
// 👍 617 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    private $result = [];

    public function combinationSum2($candidates, $target)
    {
        sort($candidates);
        $this->backTrack($candidates, $target, 0, []);

        return $this->result;
    }

    public function backTrack($candidates, $target, $begin, $arr)
    {
        if (array_sum($arr) >= $target) {
            if (array_sum($arr) == $target && !in_array($arr, $this->result)) {
                $this->result[] = $arr;
            }
            return;
        }

        $len = count($candidates);
        for ($i = $begin; $i < $len; $i++) {
            if ($target - $candidates[$i] < 0) {
                break;
            }
            if ($i > $begin && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }
            $arr[] = $candidates[$i];
            $this->backTrack($candidates, $target, $i + 1, $arr);
            array_pop($arr);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
