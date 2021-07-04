<?php

namespace Algorithms\leetcode\editor\cn;

//请实现一个函数按照之字形顺序打印二叉树，即第一行按照从左到右的顺序打印，第二层按照从右到左的顺序打印，第三行再按照从左到右的顺序打印，其他行以此类推。
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
// 返回其层次遍历结果：
//
// [
//  [3],
//  [20,9],
//  [15,7]
//]
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
// 👍 103 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

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
     * @return Integer[][]
     */
    public function levelOrder($root)
    {
        $res = [];
        if (is_null($root)) {
            return $res;
        }

        $newStack = new SplStack();
        $newStack->push($root);
        $i = 0;
        while (!$newStack->isEmpty()) {
            $stack = $newStack;
            $newStack = new SplStack();
            $arr = [];
            while (!$stack->isEmpty()) {
                $root = $stack->top();
                $stack->pop();
                $arr[] = $root->val;
                if ($i % 2 == 1) {
                    if ($root->right) {
                        $newStack->push($root->right);
                    }
                    if ($root->left) {
                        $newStack->push($root->left);
                    }
                } else {
                    if ($root->left) {
                        $newStack->push($root->left);
                    }
                    if ($root->right) {
                        $newStack->push($root->right);
                    }
                }
            }

            $res[] = $arr;
            $i++;
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
