<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个排序后的数组 A 和 B，其中 A 的末端有足够的缓冲空间容纳 B。 编写一个方法，将 B 合并入 A 并排序。
//
// 初始化 A 和 B 的元素数量分别为 m 和 n。
//
// 示例:
// 输入: A = [1,2,3,0,0,0], m = 3 B = [2,5,6],       n = 3
// 输出: [1,2,2,3,5,6]
//
// 说明: A.length == n + m
//
// Related Topics 数组 双指针

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[]  $A
     * @param  Integer    $m
     * @param  Integer[]  $B
     * @param  Integer    $n
     *
     * @return NULL
     */
    public function merge(&$A, $m, $B, $n)
    {
        $i = 0;
        $j = 0;
        $t = $m;

        while ($i < $m && $j < $n) {
            // A greater then B offset left
            if ($B[$j] < $A[$i]) {
                for ($x = $m; $x > $i; $x--) {
                    $A[$x] = $A[$x - 1];
                }
                // A length add 1
                $m++;
                $A[$i] = $B[$j++];
                $t++;
            } else {
                $i++;
            }
        }

        if ($j < $n) {
            for ($x = $j; $x < $n; $x++) {
                $A[$t++] = $B[$x];
            }
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)
$A = [1, 2, 3, 0, 0, 0];
$m = 3;
$B = [2, 5, 6];
$n = 3;

(new Solution())->merge($A, $m, $B, $n);
print_r($A);
$A = [2, 0];
$m = 1;
$B = [1];
$n = 1;

(new Solution())->merge($A, $m, $B, $n);
print_r($A);
