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
        if (empty($nums)) {
            return [];
        }
        sort($nums);
        $visited = array_fill(0, count($nums), false);
        $this->backTrack($nums, [], $visited);

        return $this->result;
    }

    /**
     * @param $nums
     * @param $path
     * @param $visited
     */
    public function backTrack($nums, $path, $visited)
    {
        if (count($path) == count($nums)) {
            $this->result[] = $path;
            return;
        }

        for ($i = 0; $i < count($nums); ++$i) {
            // 第一次剪枝:去掉已经访问过的
            if ($visited[$i]) {
                continue;
            }
            // 第二次剪枝:该元素与前一个元素相等，且前一个元素访问过
            if ($i > 0 && $nums[$i] == $nums[$i - 1] && $visited[$i - 1]) {
                continue;
            }

            $path[] = $nums[$i];
            $visited[$i] = true;
            $this->backTrack($nums, $path, $visited);
            array_pop($path);
            $visited[$i] = false;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
