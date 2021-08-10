<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个 m x n 二维字符网格 board 和一个字符串单词 word 。如果 word 存在于网格中，返回 true ；否则，返回 false 。
//
// 单词必须按照字母顺序，通过相邻的单元格内的字母构成，其中“相邻”单元格是那些水平相邻或垂直相邻的单元格。同一个单元格内的字母不允许被重复使用。
//
//
//
// 示例 1：
//
//
//输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "AB
//CCED"
//输出：true
//
//
// 示例 2：
//
//
//输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "SE
//E"
//输出：true
//
//
// 示例 3：
//
//
//输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "AB
//CB"
//输出：false
//
//
//
//
// 提示：
//
//
// m == board.length
// n = board[i].length
// 1 <= m, n <= 6
// 1 <= word.length <= 15
// board 和 word 仅由大小写英文字母组成
//
//
//
//
// 进阶：你可以使用搜索剪枝的技术来优化解决方案，使其在 board 更大的情况下可以更快解决问题？
// Related Topics 数组 回溯 矩阵

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    public function exist($board, $word)
    {
        $rowCount = count($board);
        $columnCount = count($board[0]);
        $vistied = array_fill(0, $rowCount, array_fill(0, $columnCount, 0));

        return $this->dfs($board, $word, $rowCount, $columnCount, $vistied, 0, 0, 0);
    }

    /**
     * @param $board
     * @param $word
     * @param $rowCount
     * @param $columnCount
     * @param $vistied
     * @param $wordIndex
     * @param $boardRowIndex
     * @param $boardColumnIndex
     * @return bool
     */
    public function dfs($board, $word, $rowCount, $columnCount, &$vistied, $wordIndex, $boardRowIndex, $boardColumnIndex)
    {
        if ($vistied[$boardRowIndex][$boardColumnIndex] == 1 || $boardRowIndex < 0 || $boardRowIndex == $rowCount || $boardColumnIndex < 0 || $boardColumnIndex == $columnCount) {
            return;
        }

        if ($board[$boardRowIndex][$boardColumnIndex] != $word[$wordIndex]) {
            return;
        } elseif ($wordIndex = strlen($word) - 1) {
            return true;
        }

        $vistied[$boardRowIndex][$boardColumnIndex] = 1;
        $this->dfs($board, $word, $rowCount, $columnCount, $vistied, $wordIndex + 1, $boardRowIndex + 1, $boardColumnIndex);
        $this->dfs($board, $word, $rowCount, $columnCount, $vistied, $wordIndex + 1, $boardRowIndex - 1, $boardColumnIndex);
        $this->dfs($board, $word, $rowCount, $columnCount, $vistied, $wordIndex + 1, $boardRowIndex, $boardColumnIndex + 1);
        $this->dfs($board, $word, $rowCount, $columnCount, $vistied, $wordIndex + 1, $boardRowIndex, $boardColumnIndex - 1);

        for ($i = $boardRowIndex; $i < $rowCount; $i++) {
            for ($j = $boardColumnIndex; $j < $columnCount; $j++) {
                if ($board[$i][$j] == $word[$wordIndex]) {
                    $this->dfs($board, $word, $rowCount, $columnCount, $vistied, $wordIndex + 1, $i, $j);
                }
            }
        }

        return false;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
