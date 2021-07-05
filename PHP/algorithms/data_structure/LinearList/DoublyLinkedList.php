<?php


namespace Algorithms\data_structure\LinearList;

use SplDoublyLinkedList;

class DoublyLinkedList
{

    private $firstNode = null;
    private $lastNode = null;
    private $totalNode = 0;

    public function insertAtFirst(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
            $this->lastNode = $newNode;
        } else {
            $currentFirstNode = $this->firstNode;
            $this->firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->prev = $newNode;
        }
        $this->totalNode++;
        return true;
    }

    public function insertAtLast(string $data = null)
    {
        $newNode = new ListKVNode($data);

        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
            $this->lastNode = $newNode;
        } else {
            $currentNode = $this->lastNode;
            $currentNode->next = $newNode;
            $newNode->prev = $currentNode;
            $this->lastNode = $newNode;
        }
        $this->totalNode++;
        return true;
    }

    public function insertBefore(string $data = null, string $query = null)
    {
        $newNode = new ListKVNode($data);

        if ($this->firstNode) {
            $previous = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $currentNode->prev = $newNode;
                    $previous->next = $newNode;
                    $newNode->prev = $previous;
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
        $newNode = new ListKVNode($data);

        if ($this->firstNode) {
            $nextNode = null;
            $currentNode = $this->firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== null) {
                        $newNode->next = $nextNode;
                    }
                    if ($currentNode === $this->lastNode) {
                        $this->lastNode = $newNode;
                    }
                    $currentNode->next = $newNode;
                    $nextNode->prev = $newNode;
                    $newNode->prev = $currentNode;
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
                $this->firstNode->prev = null;
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
        if ($this->lastNode !== null) {
            $currentNode = $this->lastNode;
            if ($currentNode->prev === null) {
                $this->firstNode = null;
                $this->lastNode = null;
            } else {
                $previousNode = $currentNode->prev;
                $this->lastNode = $previousNode;
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
                        $currentNode->next->prev = $previous;
                    }

                    $this->totalNode--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function displayForward()
    {
        echo "Total book titles: " . $this->totalNode . "\n";
        $currentNode = $this->firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->next;
        }
    }

    public function displayBackward()
    {
        echo "Total book titles: " . $this->totalNode . "\n";
        $currentNode = $this->lastNode;
        while ($currentNode !== null) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->prev;
        }
    }

    public function getSize()
    {
        return $this->totalNode;
    }
}

$BookTitles = new DoublyLinkedList();
$BookTitles->insertAtLast("Introduction to Algorithm");
$BookTitles->insertAtLast("Introduction to PHP and Data structures");
$BookTitles->insertAtLast("Programming Intelligence");
$BookTitles->insertAtFirst("Mediawiki Administrative tutorial guide");
$BookTitles->insertAfter("Introduction to Calculus", "Programming Intelligence");
$BookTitles->displayForward();
$BookTitles->displayBackward();
$BookTitles->deleteFirst();
$BookTitles->deleteLast();
$BookTitles->delete("Introduction to PHP and Data structures");
$BookTitles->displayForward();
$BookTitles->displayBackward();
//echo "2nd Item is: ".$BookTitles->getNthNode(2)->data;

$BookTitles = new SplDoublyLinkedList();

$BookTitles->push("Introduction to Algorithm");
$BookTitles->push("Introduction to PHP and Data structures");
$BookTitles->push("Programming Intelligence");
$BookTitles->push("Mediawiki Administrative tutorial guide");
$BookTitles->add(1, "Introduction to Calculus");
$BookTitles->add(3, "Introduction to Graph Theory");

for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) {
    echo $BookTitles->current() . "\n";
}
