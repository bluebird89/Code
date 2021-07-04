<?php

namespace Algorithms\leetcode\editor\cn;

//写一个函数，输入 n ，求斐波那契（Fibonacci）数列的第 n 项（即 F(N)）。斐波那契数列的定义如下：
//
//
//F(0) = 0,   F(1) = 1
//F(N) = F(N - 1) + F(N - 2), 其中 N > 1.
//
// 斐波那契数列由 0 和 1 开始，之后的斐波那契数就是由之前的两数相加而得出。
//
// 答案需要取模 1e9+7（1000000007），如计算初始结果为：1000000008，请返回 1。
//
//
//
// 示例 1：
//
//
//输入：n = 2
//输出：1
//
//
// 示例 2：
//
//
//输入：n = 5
//输出：5
//
//
//
//
// 提示：
//
//
// 0 <= n <= 100
//
// Related Topics 递归
// 👍 146 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    private $demo = [];

    /**
     * @param Integer $n
     *
     * @return Integer
     */
    public function fib1(int $n)
    {
        if (isset($this->demo[$n])) {
            return $this->demo[$n];
        }

        if ($n == 0 || $n == 1) {
            return $n;
        }

        $this->demo[$n] = ($this->fib($n - 1) + $this->fib($n - 2)) % 1000000007;

        return $this->demo[$n];
    }

    /**
     * add tail recursive
     *
     * @param int $n
     * @param int $prev
     * @param int $current
     *
     * @return int|mixed
     */
    public function fib2(int $n, $prev = 0, $current = 1)
    {
        if ($n == 0) {
            return 0;
        }
        if ($n == 1) {
            return $current;
        }

        return $this->fib($n - 1, $current, ($prev + $current) % 1000000007);
    }

    public function fib($n)
    {
        if ($n == 0 || $n == 1) {
            return $n;
        }

        $prev = 0;
        $current = 1;
        $sum = 0;
        for ($i = 1; $i < $n; $i++) {
            $sum = ($prev + $current) % 1000000007;
            $prev = $current;
            $current = $sum;
        }

        return $sum;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->fib(2) . PHP_EOL;
echo (new Solution())->fib(37) . PHP_EOL;
//input:45 Output:1134903170    Expected:134903163
echo (new Solution())->fib(45) . PHP_EOL;
