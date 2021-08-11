<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个链表的头节点 head 和一个整数 val ，请你删除链表中所有满足 Node.val == val 的节点，并返回 新的头节点 。
//
//
// 示例 1：
//
//
//输入：head = [1,2,6,3,4,5,6], val = 6
//输出：[1,2,3,4,5]
//
//
// 示例 2：
//
//
//输入：head = [], val = 1
//输出：[]
//
//
// 示例 3：
//
//
//输入：head = [7,7,7,7], val = 7
//输出：[]
//
//
//
//
// 提示：
//
//
// 列表中的节点在范围 [0, 104] 内
// 1 <= Node.val <= 50
// 0 <= k <= 50
//
// Related Topics 链表
// 👍 595 👎 0

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
     * @param ListNode $head
     * @param Integer $val
     *
     * @return ListNode
     */
    public function removeElements0($head, $val)
    {
        $newHead = new ListNode(0);
        $newHead->next = $head;

        $prev = $newHead;
        while ($prev->next != null) {
            if ($prev->next->val == $val) {
                $prev->next = $prev->next->next;
            } else {
                $prev = $prev->next;
            }
        }

        return $newHead->next;
    }

    /**
     * double pointer
     * @param ListNode $head
     * @param Integer $val
     *
     * @return ListNode
     */
    public function removeElements1($head, $val)
    {
        $newHead = new ListNode(0);
        $newHead->next = $head;

        $prev = $newHead;
        $current = $head;
        while ($current != null) {
            if ($current->val == $val) {
                $prev->next = $current->next;
            } else {
                $prev = $current;
            }
            $current = $current->next;
        }

        return $newHead->next;
    }

    /**
     * @param $head
     * @param $val
     * @return ListNode|mixed|null
     */
    public function removeElements($head, $val)
    {
        if ($head == null) {
            return null;
        }

        $head->next = $this->removeElements($head->next, $val);

        return $head->val == $val ? $head->next : $head;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
