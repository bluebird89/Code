<?php

namespace Algorithms\data_structure\LinearList;

class ListTable
{
    public $list;

    public function __construct($arr)
    {
        $curr = new ListNode(null);
        foreach ($arr as $val) {
            $next = new ListKVNode($val);
            $curr->next = $next;
            $curr = $next;
            $this->list[] = $curr;
        }
    }

    public function delete($target): bool
    {

        $curr = $this->list[0];
        $pre = $this->list[1];
        while ($curr->val || $curr->next) {
            if ($curr->val == $target) {
                $pre->next = $curr->next;
                unset($curr);
                return true;
            }
            $pre = $curr;
            $curr = $curr->next;
        }

        return false;
    }
}
