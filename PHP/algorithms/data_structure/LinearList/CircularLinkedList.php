<?php


namespace Algorithms\data_structure\LinearList;

class CircularLinkedList
{
    private $firstNode = null;
    private $totalNode = 0;

    public function insertAtEnd(string $data = null)
    {
        $newNode = new ListNode($data);
        if ($this->firstNode === null) {
            $this->firstNode = &$newNode;
        } else {
            $currentNode = $this->firstNode;
            while ($currentNode->next !== $this->firstNode) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $newNode->next = $this->firstNode;
        $this->totalNode++;
        return true;
    }

    public function display()
    {
        echo "Total book titles: " . $this->totalNode . "\n";
        $currentNode = $this->firstNode;
        while ($currentNode->next !== $this->firstNode) {
            echo $currentNode->data . "\n";
            $currentNode = $currentNode->next;
        }

        if ($currentNode) {
            echo $currentNode->data . "\n";
        }
    }
}

$BookTitles = new CircularLinkedList();
$BookTitles->insertAtEnd("Introduction to Algorithm");
$BookTitles->insertAtEnd("Introduction to PHP and Data structures");
$BookTitles->insertAtEnd("Programming Intelligence");
$BookTitles->insertAtEnd("Mediawiki Administrative tutorial guide");
$BookTitles->display();
