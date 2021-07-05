<?php

namespace Algorithms\data_structure\LinearList;

/*
 * 双向节点
 */

class ListBinNode
{
    public $data = null;
    public $next = null;
    public $prev = null;

    public function __construct(string $data = null)
    {
        $this->data = $data;
    }
}
