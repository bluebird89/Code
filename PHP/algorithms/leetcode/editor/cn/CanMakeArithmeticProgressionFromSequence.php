<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个数字数组 arr 。
//
// 如果一个数列中，任意相邻两项的差总等于同一个常数，那么这个数列就称为 等差数列 。
// 如果可以重新排列数组形成等差数列，请返回 true ；否则，返回 false 。
//
// 示例 1： 输入：arr = [3,5,1] 输出：true
// 解释：对数组重新排序得到 [1,3,5] 或者 [5,3,1] ，任意相邻两项的差分别为 2 或 -2 ，可以形成等差数列。
//
// 示例 2： 输入：arr = [1,2,4] 输出：false
//
// 解释：无法通过重新排序得到等差数列。
//
// 提示：
//
// 2 <= arr.length <= 1000
// -10^6 <= arr[i] <= 10^6
//
// Related Topics 排序 数组
// 👍 11 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[]  $arr
     *
     * @return Boolean
     */
    public function canMakeArithmeticProgression($arr)
    {
        sort($arr);
        $len = count($arr);
        $param = $arr[1] - $arr[0];

        for ($i = 2; $i < $len; $i++) {
            if ($arr[$i] - $arr[$i - 1] != $param) {
                return false;
            }
        }

        return true;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump((new Solution())->canMakeArithmeticProgression([1, 2, 4]));
