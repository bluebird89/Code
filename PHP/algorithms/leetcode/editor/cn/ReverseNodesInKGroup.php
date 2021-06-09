<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个链表，每 k 个节点一组进行翻转，请你返回翻转后的链表。
//
// k 是一个正整数，它的值小于或等于链表的长度。
//
// 如果节点总数不是 k 的整数倍，那么请将最后剩余的节点保持原有顺序。
//
// 进阶：
// 可以设计一个只使用常数额外空间的算法来解决此问题吗？
// 你不能只是单纯的改变节点内部的值，而是需要实际进行节点交换。
//
// 示例 1： 输入：head = [1,2,3,4,5], k = 2 输出：[2,1,4,3,5]
//
// 示例 2： 输入：head = [1,2,3,4,5], k = 3 输出：[3,2,1,4,5]
//
// 示例 3： 输入：head = [1,2,3,4,5], k = 1 输出：[1,2,3,4,5]
//
// 示例 4： 输入：head = [1], k = 1 /输出：[1]
//

// 提示：
// 列表中节点的数量在范围 sz 内
// 1 <= sz <= 5000
// 0 <= Node.val <= 1000
// 1 <= k <= sz
//
// Related Topics 链表
// 👍 1113 👎 0

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
     * @param  Integer   $k
     *
     * @return ListNode
     */
    public function reverseKGroup($head, $k)
    {
        $newHead = null;
        $newP = $newHead->next;


        $tail = null;
        $count = 0;

        while ($head) {
            if ($count % $k == 0) {
                $newP->next = $p;
                $count = 0;
                $newP = $tail;
                $p = null;
            } else {
                $tmp = $head->next;
                $tmp->next = $p;
                $p = $tmp;
                $tail = $tmp;
                $count++;
                $head = $head->next;
            }
        }

        return $newHead->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
