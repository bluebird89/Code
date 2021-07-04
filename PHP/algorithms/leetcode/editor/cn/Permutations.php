<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个不含重复数字的数组 nums ，返回其 所有可能的全排列 。你可以 按任意顺序 返回答案。
//
//
//
// 示例 1：
//
//
//输入：nums = [1,2,3]
//输出：[[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
//
//
// 示例 2：
//
//
//输入：nums = [0,1]
//输出：[[0,1],[1,0]]
//
//
// 示例 3：
//
//
//输入：nums = [1]
//输出：[[1]]
//
//
//
//
// 提示：
//
//
// 1 <= nums.length <= 6
// -10 <= nums[i] <= 10
// nums 中的所有整数 互不相同
//
// Related Topics 数组 回溯
// 👍 1425 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $result = [];

    public function permute($nums)
    {
        $this->backTrack($nums, 0, []);

        return $this->result;
    }

    public function backTrack($nums, $phase, $path)
    {
        $count = count($nums);
        if ($phase == $count) {
            array_push($this->result, $path);
            return;
        }

        for ($i = 0; $i < $count; $i++) {
            if (in_array($nums[$i], $path)) {
                continue;
            }
            array_push($path, $nums[$i]);
            $this->backTrack($nums, $phase + 1, $path);
            array_pop($path);
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
