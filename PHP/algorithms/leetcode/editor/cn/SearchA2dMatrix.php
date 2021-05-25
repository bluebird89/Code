<?php

namespace Algorithms\leetcode\editor\cn;

//编写一个高效的算法来判断 m x n 矩阵中，是否存在一个目标值。该矩阵具有如下特性：
//
//
// 每行中的整数从左到右按升序排列。
// 每行的第一个整数大于前一行的最后一个整数。
//
//
//
//
// 示例 1：
//
//
//输入：matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
//输出：true
//
//
// 示例 2：
//
//
//输入：matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
//输出：false
//
//
//
//
// 提示：
//
//
// m == matrix.length
// n == matrix[i].length
// 1 <= m, n <= 100
// -104 <= matrix[i][j], target <= 104
//
// Related Topics 数组 二分查找
// 👍 437 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[][]  $matrix
     * @param  Integer      $target
     *
     * @return Boolean
     */
    public static function searchMatrix(array $matrix, int $target)
    {
        $line_length = count($matrix);
        $column_length = count($matrix[0]);
        if ($target < $matrix[0][0] || $target > $matrix[$line_length - 1][$column_length - 1]) {
            return false;
        }

        $target_line = 0;
        for ($i = 0; $i < $line_length; $i++) {
            if ($target == $matrix[$i][0] || $target == $matrix[$i][$column_length - 1]) {
                return true;
            }
            if ($target >= $matrix[$i][0] && $target <= $matrix[$i][$column_length - 1]) {
                $target_line = $i;
                break;
            }
            if ($target < $matrix[$i + 1][0] && $target > $matrix[$i][$column_length - 1]) {
                return false;
            }
        }

        $min = 0;
        $max = $column_length - 1;
        // 行元素数量为1
        if ($max == $min) {
            return $target == $matrix[$target_line][$min];
        }
        while ($min < $max) {
            $mid = (int) (($max + $min) / 2);

            if ($target > $matrix[$target_line][$mid] && $target < $matrix[$target_line][$mid + 1]) {
                return false;
            } elseif ($target == $matrix[$target_line][$mid]) {
                return true;
            } elseif ($target > $matrix[$target_line][$mid]) {
                $min = $mid;
            } elseif ($target < $matrix[$target_line][$mid]) {
                $max = $mid;
            }
        }
    }

    // TODO:基于 DFS BFS
}

//leetcode submit region end(Prohibit modification and deletion)

$matrix = [[1, 3, 5, 7], [10, 11, 16, 20], [23, 30, 34, 60]];
var_dump(Solution::searchMatrix($matrix, 3));
var_dump(Solution::searchMatrix($matrix, 13));
var_dump(Solution::searchMatrix($matrix, 7));

$matrix = [[1]];
var_dump(Solution::searchMatrix($matrix, 1));

$matrix = [[1], [3]];
var_dump(Solution::searchMatrix($matrix, 2));
$matrix = [[1, 3, 5]];
var_dump(Solution::searchMatrix($matrix, 2));
$matrix = [[1, 1], [3, 3]];
var_dump(Solution::searchMatrix($matrix, 2));
$matrix = [[1, 1], [3, 3]];
var_dump(Solution::searchMatrix($matrix, 2));
