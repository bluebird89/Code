<?php

namespace Algorithms\leetcode\editor\cn;

//给你二叉树的根节点 root ，返回它节点值的 前序 遍历。
//
// 示例 1：
//输入：root = [1,null,2,3]
//输出：[1,2,3]
//
// 示例 2：
//输入：root = []
//输出：[]
//
// 示例 3：
//输入：root = [1]
//输出：[1]
//
// 示例 4：
//输入：root = [1,2]
//输出：[1,2]
//
// 示例 5：
//输入：root = [1,null,2]
//输出：[1,2]

// 提示：
//
//
// 树中节点数目在范围 [0, 100] 内
// -100 <= Node.val <= 100
//
// 进阶：递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树
// 👍 578 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

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
    public $res = [];

    /**
     * iterator
     *
     * @param TreeNode $root
     * @return Integer[]
     */
    public function preorderTraversal($root)
    {
        $res = [];
        if ($root == null) {
            return $res;
        }

        $stack = new SplStack();

        while ($root || !$stack->isEmpty()) {
            while ($root) {
                $res[] = $root->val;
                $stack->push($root);
                $root = $root->left;
            }

            $root = $stack->top();
            $stack->pop();
            $root = $root->right;
        }

        return $res;
    }

    // recursive
    public function preorderTraversal1($root)
    {
        if ($root == null) {
            return [];
        }

        if (!is_null($root)) {
            $this->res[] = $root->val;
            if ($root->left) {
                $this->preorderTraversal($root->left);
            }
            if ($root->right) {
                $this->preorderTraversal($root->right);
            }
        }

        return $this->res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
