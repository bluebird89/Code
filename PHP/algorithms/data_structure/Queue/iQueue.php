<?php


namespace Algorithms\data_structure\Queue;

interface iQueue
{

    public function enqueue(string $item);

    public function dequeue();

    public function peek();

    public function isEmpty();
}
