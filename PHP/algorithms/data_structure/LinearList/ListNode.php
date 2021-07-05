<?php


namespace Algorithms\data_structure\LinearList;

class ListNode
{
    public $data;
    public $next_node;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next_node = null;
    }
}
