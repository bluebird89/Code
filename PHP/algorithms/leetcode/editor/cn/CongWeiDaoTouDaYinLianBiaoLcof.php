<?php

namespace Algorithms\leetcode\editor\cn;

//输入一个链表的头节点，从尾到头反过来返回每个节点的值（用数组返回）。
//
//
//
// 示例 1：
//
// 输入：head = [1,3,2]
//输出：[2,3,1]
//
//
//
// 限制：
//
// 0 <= 链表长度 <= 10000
// Related Topics 链表
// 👍 153 👎 0

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
    private $res = [];

    /**
     * @param  ListNode  $head
     *
     * @return Integer[]
     */
    public function reversePrint($head)
    {
        if (!$head) {
            return [];
        } else {
            $this->reversePrint($head->next);
            $this->res[] = $head->val;
        }

        return $this->res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
