<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个二叉树，请你返回其按 层序遍历 得到的节点值。 （即逐层地，从左到右访问所有节点）。
//
//
//
// 示例：
//二叉树：[3,9,20,null,null,15,7],
//
//
//    3
//   / \
//  9  20
//    /  \
//   15   7
//
//
// 返回其层序遍历结果：
//
//
//[
//  [3],
//  [9,20],
//  [15,7]
//]
//
// Related Topics 树 广度优先搜索
// 👍 897 👎 0

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
     * @param TreeNode $root
     * @return Integer[][]
     */
    public function levelOrder($root)
    {
        $res = [];
        if (is_null($root)) {
            return $res;
        }
        $res[] = [$root->val];

        $nextQueue = new SplQueue();
        $nextQueue->enqueue($root);

        // dequeue current line and to res
        // enqueue next line
        while (!$nextQueue->isEmpty()) {
            $currentQueue = $nextQueue;
            $nextQueue = new SplQueue();
            $arr = [];
            while (!$currentQueue->isEmpty()) {
                $root = $currentQueue->dequeue();
                if ($root->left) {
                    $arr[] = $root->left->val;
                    $nextQueue->enqueue($root->left);
                }
                if ($root->right) {
                    $arr[] = $root->right->val;
                    $nextQueue->enqueue($root->right);
                }
            }
            if ($arr) {
                $res[] = $arr;
            }
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
