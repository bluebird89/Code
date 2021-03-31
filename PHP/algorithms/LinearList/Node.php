<?php


namespace Algorithms\LinearList;

/*
 * 单向节点
 */

class Node
{
    public $data;
    public $next_node;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next_node = null;
    }
}
