<?php

namespace Algorithms\leetcode\editor\cn;

//输入两个递增排序的链表，合并这两个链表并使新链表中的节点仍然是递增排序的。
//
// 示例1：
//
// 输入：1->2->4, 1->3->4
//输出：1->1->2->3->4->4
//
// 限制：
//
// 0 <= 链表长度 <= 1000
//
// 注意：本题与主站 21 题相同：https://leetcode-cn.com/problems/merge-two-sorted-lists/
// Related Topics 分治算法
// 👍 120 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
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
    public function mergeTwoLists($l1, $l2)
    {
        $newHead = new ListNode(0);
        $new_p = $newHead;
        while ($l1 && $l2) {
            if (($l1->val <= $l2->val)) {
                $new_p->next = $l1;
                $l1 = $l1->next;
            } elseif (($l1->val > $l2->val)) {
                $new_p->next = $l2;
                $l2 = $l2->next;
            }
            $new_p = $new_p->next;
        }

        $new_p->next = $l1 ? $l1 : $l2;
        return $newHead->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
