<?php


namespace Algorithms\data_structure\Stack;

interface iStack
{

    public function push(string $item);

    public function pop();

    public function top();

    public function isEmpty();
}
