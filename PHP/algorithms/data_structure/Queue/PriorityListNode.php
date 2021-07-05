<?php


namespace Algorithms\data_structure\Queue;

class PriorityListNode
{

    public $data = null;
    public $next = null;
    public $priority = null;

    public function __construct(string $data = null, int $priority = null)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}
