<?php

namespace Algorithms\leetcode\editor\cn;

//从上到下打印出二叉树的每个节点，同一层的节点按照从左到右的顺序打印。
//
//
//
// 例如:
//给定二叉树: [3,9,20,null,null,15,7],
//
//     3
//   / \
//  9  20
//    /  \
//   15   7
//
//
// 返回：
//
// [3,9,20,15,7]
//
//
//
//
// 提示：
//
//
// 节点总数 <= 1000
//
// Related Topics 树 广度优先搜索
// 👍 99 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplQueue;

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function levelOrder($root)
    {
        $res = [];
        if (is_null($root)) {
            return $res;
        }

        $queue = new SplQueue();
        while ($root || !$queue->isEmpty()) {
            if ($root) {
                $res[] = $root->val;
                $queue->enqueue($root->left);
                $queue->enqueue($root->right);
            }

            $root = $queue->dequeue();
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
