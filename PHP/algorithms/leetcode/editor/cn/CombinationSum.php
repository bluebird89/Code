<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个无重复元素的数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。
//
// candidates 中的数字可以无限制重复被选取。
//
// 说明：
//
//
// 所有数字（包括 target）都是正整数。
// 解集不能包含重复的组合。
//
//
// 示例 1：
//
// 输入：candidates = [2,3,6,7], target = 7,
//所求解集为：
//[
//  [7],
//  [2,2,3]
//]
//
//
// 示例 2：
//
// 输入：candidates = [2,3,5], target = 8,
//所求解集为：
//[
//  [2,2,2,2],
//  [2,3,3],
//  [3,5]
//]
//
//
//
// 提示：
//
//
// 1 <= candidates.length <= 30
// 1 <= candidates[i] <= 200
// candidate 中的每个元素都是独一无二的。
// 1 <= target <= 500
//
// Related Topics 数组 回溯
// 👍 1414 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    private $result = [];

    public function combinationSum($candidates, $target)
    {
        sort($candidates);
        $this->backTrack($candidates, $target, 0, []);

        return $this->result;
    }

    public function backTrack($candidates, $target, $begin, $arr)
    {
        if (array_sum($arr) >= $target) {
            if (array_sum($arr) == $target) {
                $this->result[] = $arr;
            }
            return;
        }

        $len = count($candidates);
        for ($i = $begin; $i < $len; $i++) {
            if ($target - $candidates[$i] < 0) {
                break;
            }
            $arr[] = $candidates[$i];
            $this->backTrack($candidates, $target, $i, $arr);
            array_pop($arr);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
