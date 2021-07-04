<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个二叉树，返回它的 后序 遍历。
//
// 示例:
//
// 输入: [1,null,2,3]
//   1
//    \
//     2
//    /
//   3
//
//输出: [3,2,1]
//
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树
// 👍 607 👎 0

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
     * revursive
     * @param TreeNode $root
     * @return Integer[]
     */
    private $res;

    public function postorderTraversal1($root)
    {
        if ($root->left) {
            $this->postorderTraversal($root->left);
        }
        if ($root->right) {
            $this->postorderTraversal($root->right);
        }

        $this->res[] = $root->val;

        return $this->res;
    }

    public function postorderTraversal($root)
    {
        $res = [];
        if (is_null($root)) {
            return $res;
        }

        $stack = new SplStack();
        while (!$stack->isEmpty() || $root) {
            while ($root) {
                $stack->push($root);
                $root = $root->left;
            }
            //将当前节点出栈，注意root.left取值有两种情况
            // 经过上方循环为null
            // 当前节点左子节点已经被访问过（在上层循环中root被置为null然后本次循环直接出栈，也就是说当前节点是上层循环中已经被加入到list中的节点的父节点）
            //两种情况都说明left已经都加入到list了。
            $root = $stack->top();
            $stack->pop();

            //检查root.right == null，如果右子节点也为null，说明当前节点为叶子节点，又因为root是一直向左边迭代的，根据后序遍历定义，此时root加入到list；
            // 第二种情况root.right不为null但是等于prev，prev表示的是已经被访问且已经加入到list中的节点，又因为root的left都已经加入list，所以当前节点直接加到list中
            if ($root->right == null || $root->right == $prev) {
                $res[] = $root->val;
                //更新prev指向当前加入到list中的节点
                $prev = $root;
                //root更新为null，不然上方的循环会错误的执行，此时只需要继续出栈就好了
                $root = null;
            } else {
                //把root再次入栈，因为root还有右节点没访问，还没到他的轮次
                $stack->push($root);
                $root = $root->right;
            }
        }

        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
