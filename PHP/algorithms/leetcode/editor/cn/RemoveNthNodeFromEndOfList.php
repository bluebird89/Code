<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个链表，删除链表的倒数第 n 个结点，并且返回链表的头结点。
//
// 进阶：你能尝试使用一趟扫描实现吗？
//
// 示例 1： 输入：head = [1,2,3,4,5], n = 2 输出：[1,2,3,5]
//
// 示例 2： 输入：head = [1], n = 1 输出：[]
//
// 示例 3： 输入：head = [1,2], n = 1 输出：[1]
//
// 提示：
// 链表中结点的数目为 sz
// 1 <= sz <= 30
// 0 <= Node.val <= 100
// 1 <= n <= sz

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
     * @param  ListNode  $head
     * @param  Integer   $n
     *
     * @return ListNode
     */
    public function removeNthFromEnd($head, $n)
    {
        if (is_null($head) || is_null($head->next)) {
            return $head;
        }

        $count = 1;
        $p = $head;
        while ($p->next) {
            $count++;
        }

        $index = $count - $n;
        $p = $head;
        $j = 1;
        while ($p) {
            if ($index == 0) {
                return $head->next;
            }
            if ($j == $index - 1) {
                $p->next = $p->next->next;
                break;
            }
            $j++;
            $p = $p->next;
        }

        return $head;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
