<?php

namespace Algorithms\data_structure\Queue;

/**
 * 通过 PHP 数组实现队列
 */
class SimpleQueue
{
    private $queue = [];
    private $size = 0;

    public function __construct($size = 10)
    {
        $this->size = $size;
    }

    // 入队
    public function enqueue($value)
    {
        if (count($this->queue) > $this->size) {
            return false;
        }
        array_push($this->queue, $value);
    }

    // 出队
    public function dequeue()
    {
        if (count($this->queue) == 0) {
            return false;
        }
        return array_shift($this->queue);
    }

    public function size()
    {
        return count($this->queue);
    }
}
