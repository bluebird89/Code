<?php

namespace Algorithms\leetcode\editor\cn;

//给你两个 非空 的链表，表示两个非负的整数。它们每位数字都是按照 逆序 的方式存储的，并且每个节点只能存储 一位 数字。
//
// 请你将两个数相加，并以相同形式返回一个表示和的链表。
//
// 你可以假设除了数字 0 之外，这两个数都不会以 0 开头。
//
//
//
// 示例 1：
//
//
//输入：l1 = [2,4,3], l2 = [5,6,4]
//输出：[7,0,8]
//解释：342 + 465 = 807.
//
//
// 示例 2：
//
//
//输入：l1 = [0], l2 = [0]
//输出：[0]
//
//
// 示例 3：
//
//
//输入：l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
//输出：[8,9,9,9,0,0,0,1]
//
//
//
//
// 提示：
//
//
// 每个链表中的节点数在范围 [1, 100] 内
// 0 <= Node.val <= 9
// 题目数据保证列表表示的数字不含前导零
//
// Related Topics 递归 链表 数学
// 👍 6229 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param  ListNode  $l1
     * @param  ListNode  $l2
     *
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2)
    {
        $newHead = new ListNode();
        $current = $newHead;

        $label = 0;
        while (!is_null($l1) || !is_null($l2)) {
            $l1val = $l1 ? $l1->val : 0;
            $l2val = $l2 ? $l2->val : 0;
            $sum = $l1val + $l2val + $label;

            $current->next = new ListNode($sum % 10);
            $label = (int) ($sum / 10);

            $l1 = $l1->next;
            $l2 = $l2->next;
            $current = $current->next;
        }
        // 最后有进位
        if ($label) {
            $current->next = new ListNode($label);
        }

        return $newHead->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
