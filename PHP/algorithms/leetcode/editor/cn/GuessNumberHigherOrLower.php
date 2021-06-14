<?php

namespace Algorithms\leetcode\editor\cn;

//猜数字游戏的规则如下：
//
//
// 每轮游戏从 1 到 n 随机选择一个数字。 请猜选出的是哪个数字。
// 如果猜错了，会告诉你，你猜测的数字比我选出的数字是大了还是小了。
//
//
// 可以通过调用一个预先定义好的接口 int guess(int num) 来获取猜测结果，返回值一共有 3 种可能的情况（-1，1 或 0）：
//
//
// -1：我选出的数字比你猜的数字小 pick < num
// 1：我选出的数字比你猜的数字大 pick > num
// 0：我选出的数字和你猜的数字一样。恭喜！你猜对了！pick == num
//
//
// 返回我选出的数字。
//
//
//
// 示例 1：
//
//
//输入：n = 10, pick = 6
//输出：6
//
//
// 示例 2：
//
//
//输入：n = 1, pick = 1
//输出：1
//
//
// 示例 3：
//
//
//输入：n = 2, pick = 1
//输出：1
//
//
// 示例 4：
//
//
//输入：n = 2, pick = 2
//输出：2
//
//
//
//
// 提示：
//
//
// 1 <= n <= 231 - 1
// 1 <= pick <= n
//
// Related Topics 二分查找
// 👍 124 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

/**
 * The API guess is defined in the parent class.
 *
 * @param  num   your guess
 *
 * @return       -1 if num is lower than the guess number
 *                1 if num is higher than the guess number
 *               otherwise return 0
 * public function guess($num){}
 */
class Solution extends GuessGame
{
    /**
     * @param  Integer[]  $n
     *
     * @return Integer
     */
    public function guessNumber($n)
    {
        $low = 1;
        $high = $n;

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            if ($this->guess($mid) == 0) {
                return $mid;
            }

            if ($this->guess($mid) == -1) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo rand(1, 10);
