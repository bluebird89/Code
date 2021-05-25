<?php

namespace Algorithms\leetcode\editor\cn;

//请判断一个链表是否为回文链表。
//
// 示例 1:
//
// 输入: 1->2
//输出: false
//
// 示例 2:
//
// 输入: 1->2->2->1
//输出: true
//
//
// 进阶：
//你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？
// Related Topics 链表 双指针
// 👍 986 👎 0

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
     * @return Boolean
     */
    public function isPalindrome($head)
    {
        $count = 0;
        $p = $head;
        $arr = [];
        while ($p) {
            $count++;
            array_push($arr, $p->val);
            $p = $p->next;
        }

        for ($i = 0; $i <= floor($count / 2); $i++) {
            if ($arr[$i] != $arr[$count - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
