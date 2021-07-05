<?php


namespace Algorithms\data_structure\LinearList;

class ListKVNode
{
    public $key = null;
    public $value = null;
    public ListKVNode $next;

    public function __construct($key = null)
    {
        $this->key = $key;
    }
}
