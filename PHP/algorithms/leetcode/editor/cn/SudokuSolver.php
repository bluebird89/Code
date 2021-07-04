<?php

namespace Algorithms\leetcode\editor\cn;

//编写一个程序，通过填充空格来解决数独问题。
//
// 数独的解法需 遵循如下规则：
//
// 数字 1-9 在每一行只能出现一次。
// 数字 1-9 在每一列只能出现一次。
// 数字 1-9 在每一个以粗实线分隔的 3x3 宫内只能出现一次。（请参考示例图）
//
//
// 数独部分空格内已填入了数字，空白格用 '.' 表示。
//
// 示例：
//
//输入：board = [["5","3",".",".","7",".",".",".","."],["6",".",".","1","9","5","."
//,".","."],[".","9","8",".",".",".",".","6","."],["8",".",".",".","6",".",".","."
//,"3"],["4",".",".","8",".","3",".",".","1"],["7",".",".",".","2",".",".",".","6"
//],[".","6",".",".",".",".","2","8","."],[".",".",".","4","1","9",".",".","5"],["
//.",".",".",".","8",".",".","7","9"]]
//输出：[["5","3","4","6","7","8","9","1","2"],["6","7","2","1","9","5","3","4","8"
//],["1","9","8","3","4","2","5","6","7"],["8","5","9","7","6","1","4","2","3"],["
//4","2","6","8","5","3","7","9","1"],["7","1","3","9","2","4","8","5","6"],["9","
//6","1","5","3","7","2","8","4"],["2","8","7","4","1","9","6","3","5"],["3","4","
//5","2","8","6","1","7","9"]]
//解释：输入的数独如上图所示，唯一有效的解决方案如下所示：
//
// 提示：
//
// board.length == 9
// board[i].length == 9
// board[i][j] 是一位数字或者 '.'
// 题目数据 保证 输入数独仅有一个解
//
// Related Topics 数组 回溯 矩阵

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    public function solveSudoku(&$board)
    {
        $this->backTrack($board, 0, 0);

        return $board;
    }

    public function backTrack(&$board, $row, $col)
    {
        // terminate condition
        if ($col == 9) {
            $row++;
            $col = 0;
            if ($row == 9) {
                return true;
            }
        }

        // if postion has value , to next
        if ($board[$row][$col] != '.') {
            return $this->backTrack($board, $row, $col + 1);
        }

        for ($k = 1; $k <= 9; $k++) {
            if ($this->hasConflict($board, $row, $col, $k)) {
                continue;
            }

            $board[$row][$col] = (string)$k;
            if ($this->backTrack($board, $row, $col + 1)) {
                return true;
            }
            $board[$row][$col] = '.';
        }

        return false;
    }

    /**
     * wether has conflict when try to fill value
     *
     * @param $row
     * @param $col
     * @param $toFilledVal
     * @return bool
     */
    public function hasConflict(&$board, $row, $col, $toFilledVal)
    {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($board[$row][$j] == $toFilledVal || $board[$i][$col] == $toFilledVal) {
                    return true;
                }
            }
        }

        $subRowBegin = floor($row / 3) * 3;
        $subColBegin = floor($col / 3) * 3;

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($board[$subRowBegin + $i][$subColBegin + $j] == $toFilledVal) {
                    return true;
                }
            }
        }

        return false;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
$board = [
    ["5", "3", ".", ".", "7", ".", ".", ".", "."],
    ["6", ".", ".", "1", "9", "5", ".", ".", "."],
    [".", "9", "8", ".", ".", ".", ".", "6", "."],
    ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
    ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
    ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
    [".", "6", ".", ".", ".", ".", "2", "8", "."],
    [".", ".", ".", "4", "1", "9", ".", ".", "5"],
    [".", ".", ".", ".", "8", ".", ".", "7", "9"]
];

var_dump((new Solution())->solveSudoku($board));
