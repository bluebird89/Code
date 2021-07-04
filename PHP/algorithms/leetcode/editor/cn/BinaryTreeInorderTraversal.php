<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个二叉树的根节点 root ，返回它的 中序 遍历。
//
//
//
// 示例 1：
//
//
//输入：root = [1,null,2,3]
//输出：[1,3,2]
//
//
// 示例 2：
//
//
//输入：root = []
//输出：[]
//
//
// 示例 3：
//
//
//输入：root = [1]
//输出：[1]
//
//
// 示例 4：
//
//
//输入：root = [1,2]
//输出：[2,1]
//
//
// 示例 5：
//
//
//输入：root = [1,null,2]
//输出：[1,2]
//
//
//
//
// 提示：
//
//
// 树中节点数目在范围 [0, 100] 内
// -100 <= Node.val <= 100
//
//
//
//
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树 哈希表
// 👍 983 👎 0

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

    /**
     * recursive
     * @param TreeNode $root
     * @return Integer[]
     */
    private $res = [];

    public function inorderTraversal1($root)
    {
        if ($root->left) {
            $this->inorderTraversal($root->left);
        }

        $this->res[] = $root->val;

        if ($root->right) {
            $this->inorderTraversal($root->right);
        }

        return $this->res;
    }

    // iterator
    public function inorderTraversal($root)
    {
        $res = [];
        $stack = new SplStack();

        while (!$stack->isEmpty() || $root) {
            while ($root) {
                $stack->push($root);
                $root = $root->left;
            }

            $root = $stack->top();
            $res[] = $root->val;
            $stack->pop();
            $root = $root->right;
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
