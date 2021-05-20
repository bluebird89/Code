<?php

namespace Algorithms\leetcode\editor\cn;

//编写一种算法，若M × N矩阵中某个元素为0，则将其所在的行与列清零。
//
//
//
// 示例 1：
//
// 输入：
//[
//  [1,1,1],
//  [1,0,1],
//  [1,1,1]
//]
//输出：
//[
//  [1,0,1],
//  [0,0,0],
//  [1,0,1]
//]
//
//
// 示例 2：
//
// 输入：
//[
//  [0,1,2,0],
//  [3,4,5,2],
//  [1,3,1,5]
//]
//输出：
//[
//  [0,0,0,0],
//  [0,4,5,0],
//  [0,3,1,0]
//]
//
// Related Topics 数组
// 👍 30 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  Integer[][]  $matrix
     *
     * @return NULL
     */
    public static function setZeroes(&$matrix)
    {
        $line_count = count($matrix);
        $column_count = count($matrix[0]);

        $lines = [];
        $columns = [];

        for ($i = 0; $i < $line_count; $i++) {
            for ($j = 0; $j < $column_count; $j++) {
                if ($matrix[$i][$j] == 0) {
                    $lines[] = $i;
                    $columns[] = $j;
                }
            }
        }
        foreach ($lines as $line) {
            $matrix[$line] = array_fill(0, $column_count, 0);
        }
        for ($i = 0; $i < $line_count; $i++) {
            $zero_count = count($columns);
            for ($j = 0; $j < $zero_count; $j++) {
                $matrix[$i][$columns[$j]] = 0;
            }
        }
    }
}

//leetcode submit region end(Prohibit modification and deletion)

$matrix = [
    [0, 1, 2, 0],
    [3, 4, 5, 2],
    [1, 3, 1, 5]
];

Solution::setZeroes($matrix);
print_r($matrix);
