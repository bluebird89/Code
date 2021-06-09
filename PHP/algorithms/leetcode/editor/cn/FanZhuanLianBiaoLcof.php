<?php

namespace Algorithms\leetcode\editor\cn;

//定义一个函数，输入一个链表的头节点，反转该链表并输出反转后链表的头节点。
//
//
//
// 示例:
//
// 输入: 1->2->3->4->5->NULL
// 输出: 5->4->3->2->1->NULL
//
//
//
// 限制：
//
// 0 <= 节点个数 <= 5000
//
//
//
// 注意：本题与主站 206 题相同：https://leetcode-cn.com/problems/reverse-linked-list/
// Related Topics 链表
// 👍 242 👎 0

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
     * @param  ListNode  $head
     *
     * @return ListNode
     */
    public function reverseList($head)
    {
        if (!$head || !$head->next) {
            return $head;
        }

        $newHead = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $newHead;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
