<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个整数数组 nums ，数组中的元素 互不相同 。返回该数组所有可能的子集（幂集）。
//
// 解集 不能 包含重复的子集。你可以按 任意顺序 返回解集。
//
// 示例 1：
//
//输入：nums = [1,2,3]
//输出：[[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]
//
//
// 示例 2：
//
//输入：nums = [0]
//输出：[[],[0]]
//
// 提示：
//
//
// 1 <= nums.length <= 10
// -10 <= nums[i] <= 10
// nums 中的所有元素 互不相同
//
// Related Topics 位运算 数组 回溯

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $result = [];

    public function subsets($nums)
    {
        $this->backTrack($nums, count($nums), []);

        return $this->result;
    }

    public function backTrack($nums, $step, $path)
    {
        if ($step == 0) {
            $this->result[] = $path;
            return;
        }

        $this->backTrack($nums, $step - 1, $path);
        $path[] = $nums[count($nums) - $step];
        $this->backTrack($nums, $step - 1, $path);
    }
}

//leetcode submit region end(Prohibit modification and deletion)

var_dump((new Solution())->subsets([1, 2, 3]));
