<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个可包含重复数字的序列 nums ，按任意顺序 返回所有不重复的全排列。
//
// 示例 1：
//输入：nums = [1,1,2]
//输出：
//[[1,1,2],
// [1,2,1],
// [2,1,1]]
//

// 示例 2：
//输入：nums = [1,2,3]
//输出：[[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]
//
// 提示：
// 1 <= nums.length <= 8
// -10 <= nums[i] <= 10
//
// Related Topics 数组 回溯

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    private $result;

    public function permuteUnique($nums)
    {
        sort($nums);
        $this->backTrack($nums, 0, [], []);

        return $this->result;
    }

    public function backTrack($nums, $phase, $sub, $lables)
    {
        $count = count($nums);
        if ($phase == $count) {
            $this->result[] = $sub;
            return;
        }

        for ($i = 0; $i < $count; $i++) {
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && !$lables[$i - 1]) {
                continue;
            }
            $sub[] = $nums[$i];
            $lables[$i] = true;
            $this->backTrack($nums, $i + 1, $sub, $lables);
            $lables[$i] = false;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
