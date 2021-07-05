<?php


namespace Algorithms\data_structure\LinearList;

class LinkedList1
{
    private $length = 0;
    public $head;

    public function __construct()
    {
        $this->head = new ListNode(0);
    }

    public function addNode(int $val)
    {
        $tmp = $this->head;
        while ($tmp->next_node != null) {
            $tmp = $tmp->next_node;
        }
        $tmp->next_node = new ListNode($val);
        $this->length++;
    }

    public function headInsert($data)
    {
        $newNode = new ListNode($data);
        $newNode->next_node = $this->head->next_node;
        $this->head->next_node = $newNode;
    }

    public function delete(ListNode $deleteNode)
    {
        if ($deleteNode->next_node == null) {
            $tmp = $this->head;
            while ($tmp->next_node != $deleteNode) {
                $tmp = $tmp->next_node;
            }
            $deleteNode->next_node = null;
        } else {
            $nextNode = $deleteNode->next_node;
            $deleteNode->data = $nextNode->data;
            $nextNode = null;
        }

        return false;
    }

    // 递归
    public static function invert(ListNode $node)
    {
        if ($node->next_node == null) {
            return $node;
        }

        $newHead = static::invert($node->next_node);

        $node->next_node->next_node = $node;
        $node->next_node = null;

        return $newHead;
    }

    // 迭代:双指针移动
    public function invertByIterator()
    {
        $pre = $this->head->next_node;
        $cur = $pre->next_node;
        $pre->next_node = null;

        while ($cur != null) {
//            在 cur 指向 pre 之前一定要先保留 cur 的后继结点，不然如果 cur 先指向 pre，之后就再也找不到后继结点了
            $next = $pre->next_node;
            $cur->next_node = $pre;

            $pre = $cur;
            $cur = $next;
        }

        $this->head->next_node = $pre;
    }

    public function display()
    {
        $tmp = $this->head;
        while ($tmp->next_node != null) {
            print $tmp->data;
            $tmp = $tmp->next_node;
        }
    }
}

$list = new LinkedList1();
$arr = [1, 2, 3, 4, 5, 6];
for ($i = 0; $i < count($arr); $i++) {
    $list->addNode($arr[$i]);
}

$list->display();
// TODO:如何构造指定节点
//$list->delete(new Node(3));
//$list->display();
echo PHP_EOL;
$rs = LinkedList1::invert($list->head);
while ($rs->next_node != null) {
    print $rs->data;
    $rs = $rs->next_node;
}
//$list->head->next_node = $rs;
//$list->display();

//$list->invertByIterator();
$list->display();
