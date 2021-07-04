<?php

namespace Algorithms\leetcode\editor\cn;

//以数组 intervals 表示若干个区间的集合，其中单个区间为 intervals[i] = [starti, endi] 。请合并所有重叠的区间，并返
//回一个不重叠的区间数组，该数组需恰好覆盖输入中的所有区间。
//
// 示例 1： /输入：intervals = [[1,3],[2,6],[8,10],[15,18]] 输出：[[1,6],[8,10],[15,18]]
//解释：区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
//
// 示例 2： 输入：intervals = [[1,4],[4,5]] 输出：[[1,5]]
//解释：区间 [1,4] 和 [4,5] 可被视为重叠区间。
//
// 提示：
//
// 1 <= intervals.length <= 104
// intervals[i].length == 2
// 0 <= starti <= endi <= 104
//
// Related Topics 排序 数组
// 👍 954 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer[][] $intervals
     *
     * @return Integer[][]
     */
    public function merge($intervals)
    {
        // sort by begin_index asend
        $count = count($intervals);
        if ($count == 1) {
            return $intervals;
        }
        $res = [];

        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($intervals[$j][0] < $intervals[$i][0]) {
                    $tmp = $intervals[$j];
                    $intervals[$j] = $intervals[$i];
                    $intervals[$i] = $tmp;
                }
            }
        }

        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($intervals[$i][1] < $intervals[$i + 1][0]) {
                    // last data not process, append to res
                    if ($i == $count - 2) {
                        $res[] = $intervals[$count - 1];
                    }
                    $res[] = $intervals[$i];
                } else {
                    $i++;
                    if ($intervals[$i][1] < $intervals[$j][0]) {
                        $res[] = [$intervals[$i][0], $intervals[$j - 1][1]];
                    } elseif ($intervals[$i][1] == $intervals[$j][0]) {
                        $res[] = [$intervals[$i][0], $intervals[$j + 1][1]];
                        break;
                    }
                }
            }
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r((new Solution())->merge([[1, 3], [2, 6], [8, 10], [15, 18]]));
//print_r((new Solution())->merge([[1, 4], [4, 5]]));
//print_r((new Solution())->merge([[1, 3]]));
//print_r((new Solution())->merge([[1,4],[2,3]]));
//print_r((new Solution())->merge([[1,4],[0,2],[3,5]]));
