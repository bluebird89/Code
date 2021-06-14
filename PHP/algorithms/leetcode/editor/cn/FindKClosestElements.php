<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个排序好的数组 arr ，两个整数 k 和 x ，从数组中找到最靠近 x（两数之差最小）的 k 个数。返回的结果必须要是按升序排好的。
//
// 整数 a 比整数 b 更接近 x 需要满足：
//
//
// |a - x| < |b - x| 或者
// |a - x| == |b - x| 且 a < b
//
//
//
//
// 示例 1：
//
//
//输入：arr = [1,2,3,4,5], k = 4, x = 3
//输出：[1,2,3,4]
//
//
// 示例 2：
//
//
//输入：arr = [1,2,3,4,5], k = 4, x = -1
//输出：[1,2,3,4]
//
//
//
//
// 提示：
//
//
// 1 <= k <= arr.length
// 1 <= arr.length <= 104
// 数组里的每个元素与 x 的绝对值不超过 104
//
// Related Topics 二分查找
// 👍 214 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @param Integer $x
     *
     * @return Integer[]
     */
    public function findClosestElements($arr, $k, $x)
    {
        $low = 0;
        $count = count($arr);
        $high = $count - 1;
        $kIndex = 0;
        $res = [];

        // find $x
        while ($low <= $high) {
            // boundary
            if ($x <= $arr[$low]) {
                $kIndex = $low;
                break;
            }

            if ($x >= $arr[$high]) {
                $kIndex = $high;
                break;
            }

            $mid = $low + floor(($high - $low) / 2);
            echo $mid;
            if ($arr[$mid] == $x) {
                $kIndex = $mid;
                break;
            } elseif ($arr[$mid] < $x) {
                // not euqal but between
                if ($arr[$mid + 1] > $x) {
                    if (abs($arr[$mid] - $x) <= abs($arr[$mid + 1] - $x)) {
                        $kIndex = $mid;
                    } else {
                        $kIndex = $mid + 1;
                    }
                    break;
                }
                $low = $mid + 1;
            } else {
                if ($arr[$mid - 1] < $x) {
                    if (abs($arr[$mid] - $x) <= abs($arr[$mid - 1] - $x)) {
                        $kIndex = $mid;
                    } else {
                        $kIndex = $mid - 1;
                    }
                    break;
                }
                $high = $mid - 1;
            }
        }
        array_push($res, $arr[$kIndex]);

        // get engouh $k
        $i = $kIndex - 1;
        $j = $kIndex + 1;
        while ($i >= -1 && $j <= $count) {
            // terminate
            if (count($res) >= $k) {
                break;
            }
            // boundary condition
            if (($kIndex == 0) || ($i == -1)) {
                array_push($res, $arr[$j]);
                $j++;
                continue;
            }
            if (($kIndex == $count - 1) || ($j == $count)) {
                array_unshift($res, $arr[$i]);
                $i--;
                continue;
            }

            $lightter = $arr[$i];
            $greater = $arr[$j];
            // |a - x| < |b - x| 或者 |a - x| == |b - x| 且 a < b
            if (abs($lightter - $x) <= abs($greater - $x)) {
                array_unshift($res, $lightter);
                $i--;
            } else {
                array_push($res, $greater);
                $j++;
            }
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r((new Solution())->findClosestElements([1, 2, 3, 4, 5], 4, 3));
print_r((new Solution())->findClosestElements([1, 2, 3, 4, 5], 4, -1));
print_r((new Solution())->findClosestElements([-2, -1, 1, 2, 3, 4, 5], 7, 3));
print_r((new Solution())->findClosestElements([0, 1, 1, 1, 2, 3, 6, 7, 8, 9], 9, 4));
print_r((new Solution())->findClosestElements([1, 1, 1, 10, 10, 10], 1, 9));
print_r((new Solution())->findClosestElements([0, 0, 0, 1, 3, 5, 6, 7, 8, 8], 2, 2));
print_r((new Solution())->findClosestElements([1, 5, 10], 1, 4));
