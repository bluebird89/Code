<?php

namespace Algorithms\data_structure\Stack;

use Algorithms\data_structure\LinearList\LinkedList3;
use Exception;
use UnderflowException;

class StackByLinkedList implements iStack
{

    private $stack;

    public function __construct()
    {
        $this->stack = new LinkedList3();
    }

    public function pop(): string
    {

        if ($this->isEmpty()) {
            throw new UnderflowException('Stack is empty');
        } else {
            $lastItem = $this->top();
            $this->stack->deleteLast();
            return $lastItem;
        }
    }

    public function push(string $newItem)
    {

        $this->stack->insert($newItem);
    }

    public function top(): string
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    public function isEmpty(): bool
    {
        return $this->stack->getSize() == 0;
    }
}

try {
    $programmingBooks = new StackByLinkedList();
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering JavaScript");
    $programmingBooks->push("MySQL Workbench tutorial");
    echo $programmingBooks->pop() . "\n";
    echo $programmingBooks->pop() . "\n";
    echo $programmingBooks->top() . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
