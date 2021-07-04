<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个二叉树，在树的最后一行找到最左边的值。
//
// 示例 1:
//
//
//输入:
//
//    2
//   / \
//  1   3
//
//输出:
//1
//
//
//
//
// 示例 2:
//
//
//输入:
//
//        1
//       / \
//      2   3
//     /   / \
//    4   5   6
//       /
//      7
//
//输出:
//7
//
//
//
//
// 注意: 您可以假设树（即给定的根节点）不为 NULL。
// Related Topics 树 深度优先搜索 广度优先搜索
// 👍 184 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplQueue;

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * recursive
     * @param TreeNode $root
     * @return Integer
     */
    public function findBottomLeftValue1($root)
    {
        $this->findBottomLeftValue($this->left);
        $this->findBottomLeftValue($this->right);

        if (is_null($root->left) && is_null($root->right)) {
            return $root->val;
        }
    }

    public function findBottomLeftValue($root)
    {
        $queue = new SplQueue();
        $queue->enqueue($root);

        while (!$queue->isEmpty()) {
            $count = $queue->count();
            for ($i = 0; $i < $count; $i++) {
                $res = [];
                $root = $queue->dequeue();
                $res[] = $root->val;
                if ($root->left) {
                    $queue->enqueue($root->left);
                }
                if ($root->right) {
                    $queue->enqueue($root->right);
                }
            }
        }

        return $res[0];
    }
}
//leetcode submit region end(Prohibit modification and deletion)
