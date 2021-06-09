<?php

namespace Algorithms\leetcode\editor\cn;

//三步问题。有个小孩正在上楼梯，楼梯有n阶台阶，小孩一次可以上1阶、2阶或3阶。实现一种方法，计算小孩有多少种上楼梯的方式。结果可能很大，需要对结果模1000000007。
//
// 示例1: 输入：n = 3  输出：4
// 说明: 有四种走法
//
// 示例2: 输入：n = 5 输出：13
//
//
// 提示: n范围在[1, 1000000]之间
//
// Related Topics 动态规划
// 👍 57 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    private $demo = [];

    /**
     * @param  Integer  $n
     *
     * @return Integer
     */
    public function waysToStep($n)
    {
        if ($n == 1 || $n == 2) {
            return $n;
        }
        if ($n == 3) {
            return 4;
        }

        if (isset($this->demo[$n])) {
            return $this->demo[$n];
        }

        $this->demo[$n] = ($this->waysToStep($n - 3) + $this->waysToStep($n - 2) + $this->waysToStep($n - 1)) % 1000000007;
        return $this->demo[$n];
    }
}

//leetcode submit region end(Prohibit modification and deletion)

echo (new Solution())->waysToStep(4);
echo (new Solution())->waysToStep(5).PHP_EOL;
echo (new Solution())->waysToStep(60).PHP_EOL;
echo (new Solution())->waysToStep(62).PHP_EOL;
