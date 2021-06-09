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
    public static function spiralOrder(array $matrix)
    {
        $result = [];
        // 确定上左下右四边位置
        $up = 0;
        $left = 0;
        $bottom = count($matrix) - 1;
        $right = count($matrix[0]) - 1;

        while (true) {
            // 取出 上边 - 从左到右
            for ($i = $left; $i <= $right; $i++) {
                $result[] = $matrix[$up][$i];
            }
            // 上边已用加向下靠1（+1）， 如果比底边大就跳出
            if (++$up > $bottom) {
                break;
            }

            // 取出 右边 - 从上到下
            for ($i = $up; $i <= $bottom; $i++) {
                $result[] = $matrix[$i][$right];
            }
            // 右面已用 向左靠1（-1）
            if (--$right < $left) {
                break;
            }

            // 取出 下边 - 从下右到下左
            for ($i = $right; $i >= $left; $i--) {
                $result[] = $matrix[$bottom][$i];
            }
            // 下边已用像上靠1（-1）
            if (--$bottom < $up) {
                break;
            }

            // 取出 下边 - 从下右到下左
            for ($i = $bottom; $i >= $up; $i--) {
                $result[] = $matrix[$i][$left];
            }
            // 左面已用向右靠1 （+1）
            if (++$left > $right) {
                break;
            }
        }
        return $result;
    }

    /**
     * @param  Integer[][]  $matrix
     *
     * @return Integer[]
     */
    public static function spiralOrder1(array $matrix)
    {
        if ($matrix == null || count($matrix) == 0 || count($matrix[0]) == 0) {
            return $matrix;
        }

        $res = [];
        $rows = count($matrix);
        $columns = count($matrix[0]);
        $total = $columns * $rows;
        $visited = [];
        $directions = [[0, 1], [1, 0], [0, -1], [-1, 0]];
        $row = 0;
        $column = 0;
        $directionIndex = 0;

        for ($i = 0; $i < $total; $i++) {
            $res[] = $matrix[$row][$column];
            $visited[$row][$column] = true;
            $nextRow = $row + $directions[$directionIndex][0];
            $nextColumn = $row + $directions[$directionIndex][1];
            if ($nextRow < 0 || $nextRow >= $rows || $nextColumn < 0 || $nextColumn >= $columns || (isset($visited[$nextRow][$nextColumn]) && $visited[$nextRow][$nextColumn])) {
                $directionIndex = ($directionIndex + 1) % 4;
            }
            $row += $directions[$directionIndex][0];
            $column += $directions[$directionIndex][1];
        }

        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
$matrix = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]];
print_r(Solution::spiralOrder($matrix));
