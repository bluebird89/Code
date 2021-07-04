<?php

namespace Algorithms\leetcode\editor\cn;

//给定 n 个非负整数表示每个宽度为 1 的柱子的高度图，计算按此排列的柱子，下雨之后能接多少雨水。
//
// 示例 1：
//
//输入：height = [0,1,0,2,1,0,1,3,2,1,2,1]
//输出：6
//解释：上面是由数组 [0,1,0,2,1,0,1,3,2,1,2,1] 表示的高度图，在这种情况下，可以接 6 个单位的雨水（蓝色部分表示雨水）。
//
// 示例 2：
//
//输入：height = [4,2,0,3,2,5]
//输出：9
//
// 提示：
//
// n == height.length
// 0 <= n <= 3 * 104
// 0 <= height[i] <= 105
//
// Related Topics 栈 数组 双指针 动态规划
// 👍 2374 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class Solution
{

    /**
     * // 存储 最大值小标
     * @param Integer[] $height
     *
     * @return Integer
     */
    public static function trap_1($height)
    {
        $count = count($height);
        $total = 0;
        if ($count < 3) {
            return 0;
        }
        $stack = new SplStack();
        $stack->push(0);
        while (!$stack->isEmpty()) {
            $inital = $stack->top();
            $stack->pop();
            $temp = 0;
            $inital = $inital ? $inital + 1 : $inital;
            for ($i = $inital; $i < $count; $i++) {
                if ($height[$i] > 0 && $stack->isEmpty()) {
                    $stack->push($i);
                    continue;
                }

                if (!$stack->isEmpty()) {
                    if ($height[$i] < $height[$stack->top()]) {
                        $temp += $height[$stack->top()] - $height[$i];
                        echo $i . '_' . $temp . PHP_EOL;
                    } else {
                        $stack->pop();
                        if ($stack->isEmpty()) {
                            $total += $temp;
                        }
                        $temp = 0;
                        $stack->push($i);
                        continue;
                    }
                }
            }
            exit;
        }

        return $total;
    }

    /**
     * // 单调栈
     * @param Integer[] $height
     *
     * @return Integer
     */
    public static function trap($height)
    {
    }
}

//leetcode submit region end(Prohibit modification and deletion)
//echo Solution::trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]);
echo Solution::trap([4, 2, 3]);
