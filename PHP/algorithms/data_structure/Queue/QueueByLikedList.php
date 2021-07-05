<?php

/*
 * Example code for: PHP 7 Data Structures and Algorithms
 *
 * Author: Mizanur rahman <mizanur.rahman@gmail.com>
 *
 */

namespace Algorithms\data_structure\Queue;

use Algorithms\data_structure\LinearList\ListNode;
use Iterator;

class QueueByLikedList implements Iterator
{

    private $firstNode = null;
    private $totalNode = 0;
    private $currentNode = null;
    private $currentPosition = 0;

    public function insert(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
        } else {
            $currentNode = $this->firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->totalNode++;
        return true;
    }

    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
        } else {
            $currentFirstNode = $this->firstNode;
            $this->firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
        }
        $this->totalNode++;
        return true;
    }

    public function search(string $data = null)
    {
        if ($this->totalNode) {
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode) {
            $previous = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->totalNode++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(string $data = null, string $query = null)
    {
        $newNode = new ListNode($data);

        if ($this->firstNode) {
            $nextNode = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->totalNode++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
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

    public function deleteLast()
    {
        if ($this->firstNode !== null) {
            $currentNode = $this->firstNode;
            if ($currentNode->next === null) {
                $this->firstNode = null;
            } else {
                $previousNode = null;

                while ($currentNode->next !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = null;
                $this->totalNode--;
                return true;
            }
        }
        return false;
    }

    public function delete(string $query = null)
    {
        if ($this->firstNode) {
            $previous = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($currentNode->next === null) {
                        $previous->next = null;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->totalNode--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function reverse()
    {
        if ($this->firstNode !== null) {
            if ($this->firstNode->next !== null) {
                $reversedList = null;
                $next = null;
                $currentNode = $this->firstNode;
                while ($currentNode !== null) {
                    $next = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $reversedList = $currentNode;
                    $currentNode = $next;
                }
                $this->firstNode = $reversedList;
            }
        }
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
        return null;
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
}
