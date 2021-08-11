<?php

namespace Algorithms\leetcode\editor\cn;

//编写代码，移除未排序链表中的重复节点。保留最开始出现的节点。
//
// 示例1:
//
//
// 输入：[1, 2, 3, 3, 2, 1]
// 输出：[1, 2, 3]
//
//
// 示例2:
//
//
// 输入：[1, 1, 1, 1, 2]
// 输出：[1, 2]
//
//
// 提示：
//
//
// 链表长度在[0, 20000]范围内。
// 链表元素在[0, 20000]范围内。
//
//
// 进阶：
//
// 如果不得使用临时缓冲区，该怎么解决？
// Related Topics 链表
// 👍 109 👎 0

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
     * @param ListNode $head
     *
     * @return ListNode
     */
    public function removeDuplicateNodes($head)
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $dummyHead = new ListNode(0);
        $cur = $dummyHead;
        $visited = [];

        while ($head) {
            if (!isset($visited[$head->val])) {
                $visited[$head->val] = true;
                $cur->next = new ListNode($head->val);
                $cur = $cur->next;
            }

            $head = $head->next;
        }

        return $dummyHead->next;
    }
}

//leetcode submit region end(Prohibit modification and deletion)

class ListNode
{
    public $data = null;
    public $next = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}

//var_dump(in_array(1, ["1"]));die;
$node1 = new ListNode(2);
$node2 = new ListNode(1);
$node2->next = $node1;
$node3 = new ListNode(1);
$node3->next = $node2;
$node4 = new ListNode(1);
$node4->next = $node3;
$node5 = new ListNode(1);
$node5->next = $node4;

//while ($node5) {
//    echo $node5->data.PHP_EOL;
//    $node5 = $node5->next;
//}
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node2->next = $node1;
$node3 = new ListNode(3);
$node3->next = $node2;
$node4 = new ListNode(3);
$node4->next = $node3;
$node5 = new ListNode(2);
$node5->next = $node4;
$node6 = new ListNode(1);
$node6->next = $node5;
(new Solution())->removeDuplicateNodes($node6);
print_r($node6);
