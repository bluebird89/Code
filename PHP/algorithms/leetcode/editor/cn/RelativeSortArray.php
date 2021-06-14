<?php

namespace Algorithms\leetcode\editor\cn;

//给你两个数组，arr1 和 arr2，
//
//
// arr2 中的元素各不相同
// arr2 中的每个元素都出现在 arr1 中
//
//
// 对 arr1 中的元素进行排序，使 arr1 中项的相对顺序和 arr2 中的相对顺序相同。未在 arr2 中出现过的元素需要按照升序放在 arr1 的末
//尾。
//
//
//
// 示例：
//
//
//输入：arr1 = [2,3,1,3,2,4,6,7,9,2,19], arr2 = [2,1,4,3,9,6]
//输出：[2,2,2,1,4,3,3,9,6,7,19]
//
//
//
//
// 提示：
//
//
// 1 <= arr1.length, arr2.length <= 1000
// 0 <= arr1[i], arr2[i] <= 1000
// arr2 中的元素 arr2[i] 各不相同
// arr2 中的每个元素 arr2[i] 都出现在 arr1 中
//
// Related Topics 排序 数组
// 👍 177 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    public function relativeSortArray($arr1, $arr2)
    {
        // divide into include and not include
        $inArr2 = [];
        $notInArr2 = [];
        foreach ($arr1 as $arr) {
            if (in_array($arr, $arr2)) {
                if (isset($inArr2[$arr])) {
                    $inArr2[$arr]++;
                } else {
                    $inArr2[$arr] = 1;
                }
            } else {
                $notInArr2[] = $arr;
            }
        }
        sort($notInArr2);
        // fill
        $des = [];
        foreach ($arr2 as $arr) {
            while ($inArr2[$arr] > 0) {
                $des[] = $arr;
                $inArr2[$arr]--;
            }
        }
        $des = array_merge($des, $notInArr2);

        return $des;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r((new Solution())->relativeSortArray([2, 3, 1, 3, 2, 4, 6, 7, 9, 2, 19], [2, 1, 4, 3, 9, 6]));
print_r((new Solution())->relativeSortArray([28, 6, 22, 8, 44, 17], [22, 28, 8, 6]));
print_r((new Solution())->relativeSortArray([2, 21, 43, 38, 0, 42, 33, 7, 24, 13, 12, 27, 12, 24, 5, 23, 29, 48, 30, 31], [2, 42, 38, 0, 43, 21]));
