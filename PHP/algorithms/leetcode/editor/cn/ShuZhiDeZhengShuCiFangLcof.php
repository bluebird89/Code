<?php

namespace Algorithms\leetcode\editor\cn;

//实现 pow(x, n) ，即计算 x 的 n 次幂函数（即，xn）。不得使用库函数，同时不需要考虑大数问题。
//
//
//
// 示例 1：
//
//
//输入：x = 2.00000, n = 10
//输出：1024.00000
//
//
// 示例 2：
//
//
//输入：x = 2.10000, n = 3
//输出：9.26100
//
// 示例 3：
//
//
//输入：x = 2.00000, n = -2
//输出：0.25000
//解释：2-2 = 1/22 = 1/4 = 0.25
//
//
//
// 提示：
//
//
// -100.0 < x < 100.0
// -231 <= n <= 231-1
// -104 <= xn <= 104
//
//
//
//
// 注意：本题与主站 50 题相同：https://leetcode-cn.com/problems/powx-n/
// Related Topics 递归
// 👍 158 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Float    $x
     * @param  Integer  $n
     *
     * @return Float
     */
    public function myPow($x, int $n)
    {
        if ($n == 0) {
            return 1;
        }

        if ($n < 0) {
            $n = -$n;
            $x = 1 / $x;
        }

        if ($n == 1) {
            return $x;
        }

        // 优化
        if ($n % 2 == 0) {
            $res = $this->myPow($x, $n / 2);
            return $res * $res;
        } else {
            $res = $this->myPow($x, ($n - 1) / 2);
            return $res * $res * $x;
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)

echo (new Solution())->myPow(2.00000, 10).PHP_EOL;
echo (new Solution())->myPow(2.00000, -2).PHP_EOL;
echo (new Solution())->myPow(8.95371, -1).PHP_EOL;
//echo (new Solution())->myPow(0.00001, 2147483647).PHP_EOL;
echo pow(2, 31);
