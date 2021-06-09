<?php

namespace Algorithms\leetcode\editor\cn;

//请根据每日 气温 列表，重新生成一个列表。对应位置的输出为：要想观测到更高的气温，至少需要等待的天数。如果气温在这之后都不会升高，请在该位置用 0 来代替。
//
//
// 例如，给定一个列表 temperatures = [73, 74, 75, 71, 69, 72, 76, 73]，输出 [1, 1, 4, 2, 1, 1, 0, 0]。
//
// 提示：气温 列表长度的范围是 [1, 30000]。每个气温的值的均为华氏度，都是在 [30, 100] 范围内的整数。
// Related Topics 栈 哈希表
// 👍 765 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class Solution
{

    /**
     * @param  Integer[]  $temperatures
     *
     * @return Integer[]
     * @deprecated: exceed maxtime
     */
    public static function dailyTemperatures_1($temperatures)
    {
        $res = [];
        $count = count($temperatures);

        for ($i = 0; $i < $count - 1; $i++) {
            $res[$i] = 0;
            for ($j = $i + 1; $j < $count; $j++) {
                if ($temperatures[$j] > $temperatures[$i]) {
                    $res[$i] = $j - $i;
                    break;
                }
            }
        }

        $res[$count - 1] = 0;

        return $res;
    }

    /**
     * @param  Integer[]  $temperatures
     *
     * @return Integer[]
     */
    public static function dailyTemperatures($temperatures)
    {
        $res = [];
        $stack = new SplStack();
        $count = count($temperatures);
        for ($i = 0; $i < $count; $i++) {
            $res[$i] = 0;
            // tips:比较的是值
            while (!$stack->isEmpty() && $temperatures[$i] > $temperatures[$stack->top()]) {
                $inx = $stack->top();
                $stack->pop();
                $res[$inx] = $i - $inx;
            }
            $stack->push($i);
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r(Solution::dailyTemperatures([73, 74, 75, 71, 69, 72, 76, 73]));
