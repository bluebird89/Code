<?php

namespace Algorithms\leetcode\editor\cn;

//设计一种算法，打印 N 皇后在 N × N 棋盘上的各种摆法，其中每个皇后都不同行、不同列，也不在对角线上。这里的“对角线”指的是所有的对角线，不只是平分整
//个棋盘的那两条对角线。
//
// 注意：本题相对原题做了扩展
//
// 示例:
//
//  输入：4
// 输出：[[".Q..","...Q","Q...","..Q."],["..Q.","Q...","...Q",".Q.."]]
// 解释: 4 皇后问题存在如下两个不同的解法。
//[
// [".Q..",  // 解法 1
//  "...Q",
//  "Q...",
//  "..Q."],
//
// ["..Q.",  // 解法 2
//  "Q...",
//  "...Q",
//  ".Q.."]
//]
//
// Related Topics 数组 回溯
// 👍 87 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    /**
     * @param Integer $n
     * @return String[][]
     */
    private $result = [];

    public function solveNQueens($n)
    {
        if ($n <= 0) {
            return [];
        }
        $board = array_fill(0, $n, array_fill(0, $n, '.'));
        $this->backTrack($n, 0, $board);

        return $this->result;
    }

    public function backTrack($stepIndex, $row, $board)
    {
        if ($row == $stepIndex) {
            $tmp = [];
            foreach ($board as $item) {
                $tmp[] = implode('', $item);
            }
            $this->result[] = $tmp;
            return;
        }

        // 遍历当前行每一列
        for ($col = 0; $col < $stepIndex; ++$col) {
            if (!$this->isProper($stepIndex, $board, $row, $col)) {
                continue;
            }
            $board[$row][$col] = 'Q';
            $this->backTrack($stepIndex, $row + 1, $board);
            $board[$row][$col] = '.';
        }
    }

//    public function isProper($board, $row, $col)
//    {
//        for ($i = 0; $i < $row; $i++) {
//            $rowIndex = array_search('Q', $board[$i]);
//            if (($rowIndex == $col) || (abs($row - $i) == abs($col - $rowIndex))) {
//                return false;
//            }
//        }
//
//        return true;
//    }

    private function isProper($n, $board, $row, $col)
    {
        // 同一行，无需考虑
        // 左下和右下，遍历到这里时还是空的，无需考虑
        // 同一列
        for ($i = 0; $i < $n; ++$i) {
            if ($board[$i][$col] == 'Q') {
                return false;
            }
        }

        // 左上
        $i = $row - 1;
        $j = $col - 1;
        for (; $i >= 0 && $j >= 0; --$i, --$j) {
            if ($board[$i][$j] == 'Q') {
                return false;
            }
        }

        // 右上
        $i = $row - 1;
        $j = $col + 1;
        for (; $i >= 0 && $j < $n; --$i, ++$j) {
            if ($board[$i][$j] == 'Q') {
                return false;
            }
        }

        return true;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump((new Solution())->solveNQueens(4));
