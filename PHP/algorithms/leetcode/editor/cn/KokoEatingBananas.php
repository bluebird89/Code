<?php

namespace Algorithms\leetcode\editor\cn;

//珂珂喜欢吃香蕉。这里有 N 堆香蕉，第 i 堆中有 piles[i] 根香蕉。警卫已经离开了，将在 H 小时后回来。
//
// 珂珂可以决定她吃香蕉的速度 K （单位：根/小时）。每个小时，她将会选择一堆香蕉，从中吃掉 K 根。如果这堆香蕉少于 K 根，她将吃掉这堆的所有香蕉，然后
//这一小时内不会再吃更多的香蕉。
//
// 珂珂喜欢慢慢吃，但仍然想在警卫回来前吃掉所有的香蕉。
//
// 返回她可以在 H 小时内吃掉所有香蕉的最小速度 K（K 为整数）。
//
//
//
//
//
//
// 示例 1：
//
// 输入: piles = [3,6,7,11], H = 8
//输出: 4
//
//
// 示例 2：
//
// 输入: piles = [30,11,23,4,20], H = 5
//输出: 30
//
//
// 示例 3：
//
// 输入: piles = [30,11,23,4,20], H = 6
//输出: 23
//
//
//
//
// 提示：
//
//
// 1 <= piles.length <= 10^4
// piles.length <= H <= 10^9
// 1 <= piles[i] <= 10^9
//
// Related Topics 二分查找
// 👍 178 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    public function minEatingSpeed($piles, $h)
    {
        sort($piles);
        $count = count($piles);
        if ($h == $count) {
            return $piles[$count - 1];
        }

        $low = 1;
        $high = $piles[$count - 1];

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);

            $totalTime = 0;
            foreach ($piles as $pile) {
                $totalTime += ceil($pile / $mid);
            }

            // terminate condtion:$mid > $h && $mid+1 < $h
            if ($totalTime > $h) {
                $prevTotalTime = 0;
                foreach ($piles as $pile) {
                    $prevTotalTime += ceil($pile / ($mid + 1));
                }
                if ($prevTotalTime <= $h) {
                    return $mid + 1;
                }
                $low = $mid + 1;
            } else {
                $high = $mid - 1;
            }
        }

        return 1;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->minEatingSpeed([3, 6, 7, 11], 8) . PHP_EOL;
echo (new Solution())->minEatingSpeed([30, 11, 23, 4, 20], 5) . PHP_EOL;
echo (new Solution())->minEatingSpeed([30, 11, 23, 4, 20], 6) . PHP_EOL;
echo (new Solution())->minEatingSpeed([30, 11, 23, 4, 20], 6) . PHP_EOL;
echo (new Solution())->minEatingSpeed([312884470], 968709470) . PHP_EOL;
