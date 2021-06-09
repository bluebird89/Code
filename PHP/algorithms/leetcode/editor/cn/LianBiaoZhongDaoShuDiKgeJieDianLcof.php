<?php

namespace Algorithms\leetcode\editor\cn;

//输入一个链表，输出该链表中倒数第k个节点。为了符合大多数人的习惯，本题从1开始计数，即链表的尾节点是倒数第1个节点。
//
// 例如，一个链表有 6 个节点，从头节点开始，它们的值依次是 1、2、3、4、5、6。这个链表的倒数第 3 个节点是值为 4 的节点。
//
//
//
// 示例：
//
//
//给定一个链表: 1->2->3->4->5, 和 k = 2.
//
//返回链表 4->5.
// Related Topics 链表 双指针
// 👍 195 👎 0

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
     * 倒数第k个节点转化为正数值
     *
     * @param  ListNode  $head
     * @param  Integer   $k
     *
     * @return ListNode
     */
    public function getKthFromEnd1($head, $k)
    {
        $newHead = new ListNode();
        $newHead->next = $head;
        $count = 0;
        while ($head) {
            $count++;
            $head = $head->next;
        }
        $res_index = $count - $k;
        $res = $newHead->next;
        for ($i = 0; $i < $res_index; $i++) {
            $res = $res->next;
        }

        return $res;
    }

    /**
     * 双指针
     *
     * @param  ListNode  $head
     * @param  Integer   $k
     *
     * @return ListNode
     */
    public function getKthFromEnd($head, $k)
    {
        if (is_null($head)) {
            return $head;
        }
        $former = $head;
        $latter = $head;
        for ($i = 0; $i < $k; $i++) {
            if (is_null($latter->next)) {
                return $former;
            }
            $latter = $latter->next;
        }

        while ($latter) {
            if (is_null($latter->next)) {
                return $former->next;
            }
            $latter = $latter->next;
            $former = $former->next;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
