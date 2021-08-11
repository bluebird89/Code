<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个链表，判断链表中是否有环。
//
// 如果链表中有某个节点，可以通过连续跟踪 next 指针再次到达，则链表中存在环。 为了表示给定链表中的环，使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。 如果 pos 是 -1，则在该链表中没有环。
// 注意：pos 不作为参数进行传递，仅仅是为了标识链表的实际情况。
//
// 如果链表中存在环，则返回 true 。 否则，返回 false 。
//
// 进阶：能用 O(1)（即，常量）内存解决此问题吗？
//
// 示例 1：
//
// 输入：head = [3,2,0,-4], pos = 1
// 输出：true
// 解释：链表中有一个环，其尾部连接到第二个节点。
//
// 示例 2：
//
// 输入：head = [1,2], pos = 0
// 输出：true
// 解释：链表中有一个环，其尾部连接到第一个节点。
//
// 示例 3：
//
// 输入：head = [1], pos = -1
// 输出：false
// 解释：链表中没有环。
//
// 提示：
//
// 链表中节点的数目范围是 [0, 104]
// -105 <= Node.val <= 105
// pos 为 -1 或者链表中的一个 有效索引 。
//
// Related Topics 链表 双指针
// 👍 1069 👎 0

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
     * 方法一：哈希表
     *
     * @param $head
     *
     * @return bool
     */
    public static function hasCycle1($head)
    {
        $res = [];
        while ($head) {
            if (in_array($head, $res)) {
                return true;
            }

            $res[] = $head;
            $head = $head->next;
        }

        return false;
    }

    /**
     * slow && fast
     *
     * @param ListNode $head
     *
     * @return Boolean
     */
    public static function hasCycle($head)
    {
        $slow = $head;
        $fast = $slow->next;

        while ($slow && $fast) {
            if ($slow == $fast) {
                return true;
            }
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        return false;
    }

    /**
     * 双指针：快慢指针都会进入到环
     *
     * @param $head
     *
     * @return bool
     */
    public static function hasCycle3($head)
    {
        if ($head == null || $head->next == null) {
            return false;
        }

        $slow = $head;
        $fast = $head->next;
        while ($slow != $fast) {
            if ($fast == null || $fast->next == null) {
                return false;
            }
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        return true;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
