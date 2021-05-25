<?php

namespace Algorithms\leetcode\editor\cn;

//存在一个按升序排列的链表，给你这个链表的头节点 head ，请你删除所有重复的元素，使每个元素 只出现一次 。
//
// 返回同样按升序排列的结果链表。
//
//
//
// 示例 1：
//
//
//输入：head = [1,1,2]
//输出：[1,2]
//
//
// 示例 2：
//
//
//输入：head = [1,1,2,3,3]
//输出：[1,2,3]
//
//
//
//
// 提示：
//
//
// 链表中节点数目在范围 [0, 300] 内
// -100 <= Node.val <= 100
// 题目数据保证链表已经按升序排列
//
// Related Topics 链表
// 👍 576 👎 0

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
     *
     * @return ListNode
     */
    public function deleteDuplicates($head)
    {
        $newHead = new ListNode();
        $newHead->next = $head;
        $prev = $newHead->next;

        while ($prev->next) {
            if ($prev->val == $prev->next->val) {
                $prev->next = $prev->next->next;
            } else {
                $prev = $prev->next;
            }
        }

        return $newHead->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
