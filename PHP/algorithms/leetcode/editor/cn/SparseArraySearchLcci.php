<?php

namespace Algorithms\leetcode\editor\cn;

//稀疏数组搜索。有个排好序的字符串数组，其中散布着一些空字符串，编写一种方法，找出给定字符串的位置。
//
// 示例1:
//
//  输入: words = ["at", "", "", "", "ball", "", "", "car", "", "","dad", "", ""],
// s = "ta"
// 输出：-1
// 说明: 不存在返回-1。
//
//
// 示例2:
//
//  输入：words = ["at", "", "", "", "ball", "", "", "car", "", "","dad", "", ""],
//s = "ball"
// 输出：4
//
//
// 提示:
//
//
// words的长度在[1, 1000000]之间
//
// Related Topics 二分查找
// 👍 49 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String[] $words
     * @param String $s
     *
     * @return Integer
     */
    public function findString(array $words, $s)
    {
        $low = 0;
        $high = count($words) - 1;

        while ($low <= $high) {
            $mid = $low + floor($high - $low / 2);
            if ($words[$mid] == $s) {
                return $mid;
            }

            if ($words[$mid] == ' ') {
                // test direction
                if ($words[$mid] > $s) {
                    $low = $mid + 1;
                } else {
                    $high = $mid - 1;
                }
            }
        }


        return -1;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump("at" < "ball");
