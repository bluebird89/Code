<?php

/*
 * leetcode 104，111: 给定一个二叉树，找出其最大/最小深度。
 */

class TreNode
{
    public $data = null;
    public $children = [];

    public function __construct(string $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }

    public function addChildren(TreNode $left, TreNode $right)
    {
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{
    /**
     * leetcode 104: 求树的最大深度
     *
     * @param  node
     *
     * @return
     */
    public static function getMaxDepth(TreNode $node)
    {
        if ($node->data == null) {
            return 0;
        }
        $leftDepth = static::getMaxDepth($node->left) + 1;
        $rightDepth = static::getMaxDepth($node->right) + 1;

        return max($leftDepth, $rightDepth);
    }

    /**
     * leetcode 111: 求树的最小深度
     *
     * @param  node
     *
     * @return
     */
    public static function getMinDepth(TreNode $node)
    {
        if ($node->data == null) {
            return 0;
        }

        $leftDepth = static::getMinDepth($node->left) + 1;
        $rightDepth = static::getMinDepth($node->right) + 1;

        return min($leftDepth, $rightDepth);
    }
}
