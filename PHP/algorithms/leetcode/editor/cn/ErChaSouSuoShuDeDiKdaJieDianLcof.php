<?php

namespace Algorithms\leetcode\editor\cn;

//给定一棵二叉搜索树，请找出其中第k大的节点。
//
//
//
// 示例 1:
//
// 输入: root = [3,1,4,null,2], k = 1
//   3
//  / \
// 1   4
//  \
//   2
//输出: 4
//
// 示例 2:
//
// 输入: root = [5,3,6,2,4,null,null,1], k = 3
//       5
//      / \
//     3   6
//    / \
//   2   4
//  /
// 1
//输出: 4
//
//
//
// 限制：
//
// 1 ≤ k ≤ 二叉搜索树元素个数
// Related Topics 树
// 👍 169 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

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
     * @param Integer $k
     * @return Integer
     */
    public function kthLargest($root, $k)
    {
        $res = $this->midTravsal($root);
        return $res[$k - 1];
    }

    private $res = [];

    public function midTravsal($root)
    {
        if (is_null($root)) {
            return;
        }

        if ($root->right) {
            $this->midTravsal($root->right);
        }
        $this->res[] = $root->val;

        if ($root->left) {
            $this->midTravsal($root->left);
        }

        return $this->res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
