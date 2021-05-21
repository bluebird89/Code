<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个 m 行 n 列的矩阵 matrix ，请按照顺时针螺旋顺序 ，返回矩阵中的所有元素。
//
//
//
// 示例 1：
//
//
//输入：matrix = [[1,2,3],[4,5,6],[7,8,9]]
//输出：[1,2,3,6,9,8,7,4,5]
//
//
// 示例 2：
//
//
//输入：matrix = [[1,2,3,4],[5,6,7,8],[9,10,11,12]]
//输出：[1,2,3,4,8,12,11,10,9,5,6,7]
//
//
//
//
// 提示：
//
//
// m == matrix.length
// n == matrix[i].length
// 1 <= m, n <= 10
// -100 <= matrix[i][j] <= 100
//
// Related Topics 数组
// 👍 777 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[][]  $matrix
     *
     * @return Integer[]
     */
    public static function spiralOrder($matrix)
    {
        $res = [];
        $line_count = count($matrix);
        $column_count = count($matrix[0]);
        for ($i = 0; $i < $column_count; $i++) {
            $res[] = $matrix[0][$i];
        }
        for ($j = 1; $j < $line_count; $j++) {
            $res[] = $matrix[$j][$column_count - 1];
        }

//        for ($i = $column_count - 2; $i >= 0; $i--) {
//            $res[] = $matrix[$line_count - 1][$i];
//        }
        for ($i = 0; $i <= $column_count - 2; $i++) {
            $res[] = $matrix[$line_count - 1][$column_count - $i - 2];
        }

//        for ($j = $line_count - 2; $j >= 1; $j--) {
//            $res[] = $matrix[$j][0];
//        }
        for ($j = 0; $j < $line_count - 2; $j++) {
            $res[] = $matrix[$line_count - 2 - $j][0];
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
$matrix = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]];
print_r(Solution::spiralOrder($matrix));
