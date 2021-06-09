<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个单链表，把所有的奇数节点和偶数节点分别排在一起。请注意，这里的奇数节点和偶数节点指的是节点编号的奇偶性，而不是节点的值的奇偶性。
//
// 请尝试使用原地算法完成。你的算法的空间复杂度应为 O(1)，时间复杂度应为 O(nodes)，nodes 为节点总数。
//
// 示例 1:
//
// 输入: 1->2->3->4->5->NULL
//输出: 1->3->5->2->4->NULL
//
//
// 示例 2:
//
// 输入: 2->1->3->5->6->4->7->NULL
//输出: 2->3->6->7->1->5->4->NULL
//
// 说明:
//
//
// 应当保持奇数节点和偶数节点的相对顺序。
// 链表的第一个节点视为奇数节点，第二个节点视为偶数节点，以此类推。
//
// Related Topics 链表
// 👍 424 👎 0

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
     * 新链表不断插入偶节点
     * 保持链表连续
     */
    /**
     * @param  ListNode  $head
     *
     * @return ListNode
     */
    public function oddEvenList($head)
    {
        if ($head == null) {
            return $head;
        }
        // odd奇数-》even偶数
        // 偶数
        $odd = $head;
        $evenHead = $head->next;
        $even = $evenHead;

        while ($even != null && $even->next != null) {
            $odd->next = $even->next;
            $odd = $odd->next;

            $even->next = $odd->next;
            $even = $even->next;
        }
        $odd->next = $evenHead;

        return $head;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
