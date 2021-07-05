<?php

namespace Algorithms\data_structure\Queue;

use Iterator;

require '../../../vendor/autoload.php';

class PriorityQueue implements Iterator
{

    private $firstNode = null;
    private $totalNode = 0;
    private $currentNode = null;
    private $currentPosition = 0;

    public function insert(string $data = null, int $priority = null)
    {
        $newNode = new PriorityListNode($data, $priority);
        $this->totalNode++;

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
        } else {
            $previous = $this->firstNode;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->priority < $priority) {
                    if ($currentNode == $this->firstNode) {
                        $previous = $this->firstNode;
                        $this->firstNode = $newNode;
                        $newNode->next = $previous;
                        return;
                    }
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    return;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }

        return true;
    }

    public function deleteFirst()
    {
        if ($this->firstNode !== null) {
            if ($this->firstNode->next !== null) {
                $this->firstNode = $this->firstNode->next;
            } else {
                $this->firstNode = null;
            }
            $this->totalNode--;
            return true;
        }
        return false;
    }


    public function getSize()
    {
        return $this->totalNode;
    }

    public function current()
    {
        return $this->currentNode->data;
    }

    public function next()
    {
        $this->currentPosition++;
        $this->currentNode = $this->currentNode->next;
    }

    public function key()
    {
        return $this->currentPosition;
    }

    public function rewind()
    {
        $this->currentPosition = 0;
        $this->currentNode = $this->firstNode;
    }

    public function valid()
    {
        return $this->currentNode !== null;
    }

    public function getNthNode(int $n = 0)
    {
        $count = 1;
        if ($this->firstNode !== null && $n <= $this->totalNode) {
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($count === $n) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function display()
    {
        echo "Total book titles: " . $this->totalNode . "\n";
        $currentNode = $this->firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->next;
        }
    }
}
