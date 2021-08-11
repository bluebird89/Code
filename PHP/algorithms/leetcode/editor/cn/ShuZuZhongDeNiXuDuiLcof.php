<?php

namespace Algorithms\leetcode\editor\cn;

//在数组中的两个数字，如果前面一个数字大于后面的数字，则这两个数字组成一个逆序对。输入一个数组，求出这个数组中的逆序对的总数。
//
// 示例 1: 输入: [7,5,6,4] 输出: 5
//
// 限制：
//
// 0 <= 数组长度 <= 50000

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    private int $cnt = 0;

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    public function reversePairs($nums)
    {
        return $this->mergeSort($nums, 0, count($nums) - 1);
    }

    public function mergeSort(&$nums, $l, $r)
    {
        if ($l >= $r) {
            return;
        }
        $mid = floor(($l + $r) / 2);

        $this->cnt = $this->mergeSort($nums, $l, $mid) + $this->mergeSort($nums, $mid + 1, $r);

        $i = $l;
        $j = $mid + 1;
        while ($i <= $mid && $j <= $r) {
            if ($nums[$i] <= $nums[$j]) {
                $i++;
                $this->cnt += ($j - ($mid + 1));
                echo $nums[$j] . '-' . $nums[$i] . PHP_EOL;
            } else {
                $tmp = $nums[$j];
                $nums[$j++] = $nums[$i];
                $nums[$i++] = $tmp;
            }
        }

        while ($i <= $mid) {
            $i++;
            $this->cnt += ($j - ($mid + 1));
        }
        while ($j <= $r) {
            $j++;
        }

        return $this->cnt;
    }
}

//leetcode submit region end(Prohibit modification and deletion)

echo (new Solution())->reversePairs([7, 5, 6, 4]);
