<?php

namespace Algorithms\leetcode\editor\cn;

//编写一个函数，不用临时变量，直接交换numbers = [a, b]中a与b的值。
//
// 示例：
//
//
//输入: numbers = [1,2]
//输出: [2,1]
//
//
// 提示：
//
//
// numbers.length == 2
// -2147483647 <= numbers[i] <= 2147483647
//
// Related Topics 位运算 数学
// 👍 52 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $numbers
     * @return Integer[]
     */
    public function swapNumbers($numbers)
    {
        $mid = $numbers[0] ^ $numbers[1];
        $numbers[0] = $mid ^ $numbers[0];
        $numbers[1] = $mid ^ $numbers[1];

        return $numbers;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
