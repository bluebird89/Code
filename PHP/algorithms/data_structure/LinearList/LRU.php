<?php

namespace Algorithms\data_structure\LinearList;

class LRU
{
    public $maxSize;
    public $size = 0;
    public $firstNode;

    public function __construct($maxSize)
    {
        $this->maxSize = $maxSize;
    }

    public function set($key, $value)
    {
        $newNode = new ListNode($key);
        $newNode->value = $value;

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
        } else {
            $currentNode = $this->firstNode;
            while (isset($currentNode->next)) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->size++;

        return true;
    }

    public function get($key)
    {
        $node = $this->firstNode;
        while ($node = $node->next) {
            if ($node->key == $key) {
                return $node->value;
            }
        }

        return null;
    }
}

$ins = new LRU(5);
$ins->set('name', 'Henry');
$ins->set('age', 30);
$ins->set('age', 40);
$ins->set('age', 50);
$ins->set('age', 60);
$ins->set('name', 'lily');
$ins->set('name', 'henry2');
$ins->set('name', 'henry3');

var_dump($ins->get('name'));
