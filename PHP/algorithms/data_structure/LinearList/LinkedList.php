<?php

namespace Algorithms\data_structure\LinearList;

use Iterator;

/**
 * 链表
 * 实现 Iterator，方便遍历
 * Class LinkedList
 *
 * @package Algorithms\LinearList
 */
class LinkedList implements Iterator
{

    private $_firstNode = null;
    private $_totalNode = 0;

    /*
     * 读取索引位置值
     */
    public function read($index)
    {
        $this->_currentNode = $this->_firstNode;
        $this->_currentPosition = 0;

        while ($this->_currentPosition < $index) {
            $this->_currentNode = $this->_currentNode->next_node;
            $this->_currentPosition++;
            if (!$this->_currentNode) {
                return null;
            }
        }

        return $this->_currentNode->data;
    }

    /*
     * 获取指定位置节点，从1开始
     */
    public function getNthNode(int $n = 0)
    {
        $count = 1;
        if ($this->_firstNode !== null && $n <= $this->_totalNode) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($count === $n) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next_node;
            }
        }
    }

    /**
     * 查找
     *
     * @param $value
     *
     * @return int|null
     */
    public function index_of($value)
    {
        $this->_currentNode = $this->_firstNode;
        $this->_currentPosition = 0;

        do {
            if ($this->_currentNode->data == $value) {
                return $this->_currentPosition;
            }

            $this->_currentNode = $this->_currentNode->next_node;
            $this->_currentPosition++;
        } while ($this->_currentNode);

        return null;
    }

    public function search(string $data = null)
    {
        if ($this->_totalNode) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $data) {
                    return $currentNode;
                }
                $currentNode = $currentNode->next_node;
            }
        }

        return false;
    }

    /**
     * 默认插入尾部
     *
     * @param  string|null  $data
     *
     * @return bool
     */
    public function insert(string $data = null)
    {
        $newNode = new Node($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;

            while ($currentNode->next_node !== null) {
                $currentNode = $currentNode->next_node;
            }
            $currentNode->next_node = $newNode;
        }

        $this->_totalNode++;
        return true;
    }

    /*
     * 指定索引位置前面插入
     */
    public function insertAtIndex(int $index, $data)
    {
        $newNode = new Node($data);
        // 头部插入
        if ($index == 0) {
            $newNode->next_node = $this->_firstNode;
            return $this->_firstNode = $newNode;
        }
        $currentNode = $this->_firstNode;
        $currentIndex = 0;
        while ($currentIndex < $index - 1) {
            $currentIndex++;
            $currentNode = $currentNode->next_node;
        }

        $newNode->next_node = $currentNode->next_node;
        $currentNode->next_node = $newNode;
    }

    public function insertAtFirst(string $data = null)
    {
        $newNode = new Node($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = &$newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = &$newNode;
            $newNode->next_node = $currentFirstNode;
        }
        $this->_totalNode++;

        return true;
    }

    /*
     * 插入到指定节点前面
     */
    public function insertBefore(string $data = null, string $value = null)
    {
        $newNode = new Node($data);

        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $value) {
                    $newNode->next_node = $currentNode;
                    $previous->next_node = $newNode;
                    $this->_totalNode++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next_node;
            }
        }
    }

    public function insertAfter(string $data = null, string $value = null)
    {
        $newNode = new Node($data);

        if ($this->_firstNode) {
            $nextNode = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $value) {
                    if ($nextNode !== null) {
                        $newNode->next_node = $nextNode;
                    }
                    $currentNode->next_node = $newNode;
                    $this->_totalNode++;
                    break;
                }
                $currentNode = $currentNode->next_node;
                $nextNode = $currentNode->next_node;
            }
        }
    }

    public function deleteFirst()
    {
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next_node !== null) {
                $this->_firstNode = $this->_firstNode->next_node;
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNode--;
            return true;
        }

        return false;
    }

    public function deleteLast()
    {
        if ($this->_firstNode !== null) {
            $currentNode = $this->_firstNode;
            if ($currentNode->next_node === null) {
                $this->_firstNode = null;
            } else {
                $previousNode = null;

                while ($currentNode->next_node !== null) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next_node;
                }

                $previousNode->next_node = null;
                $this->_totalNode--;
                return true;
            }
        }
        return false;
    }

    public function deleteAtIndex(int $index)
    {
        if ($index == 0) {
            $deletedNode = $this->_firstNode;
            $this->_firstNode = $this->_firstNode->next_node;

            return $deletedNode;
        }

        $currentNode = $this->_firstNode;
        $currentIndex = 0;
        while ($currentIndex < $index - 1) {
            $currentIndex++;
            $currentNode = $currentNode->next_node;
        }

        $deletedNode = $currentNode->next_node;
        $currentNode->next_node = $deletedNode->next_node;

        return $deletedNode;
    }

    /**
     * 删除列表中指定值
     *
     * @param  string|null  $value
     */
    public function delete(string $value = null)
    {
        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;
            while ($currentNode !== null) {
                if ($currentNode->data === $value) {
                    if ($currentNode->next_node === null) {
                        $previous->next_node = null;
                    } else {
                        $previous->next_node = $currentNode->next_node;
                    }

                    $this->_totalNode--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next_node;
            }
        }
    }

    /**
     * 反转
     */
    public function reverse()
    {
        if ($this->_firstNode == null || $this->_firstNode->next_node == null) {
            return;
        }

        $reversedList = null;
        $next = null;
        $currentNode = $this->_firstNode;

        while ($currentNode !== null) {
            $next = $currentNode->next_node;
            $currentNode->next_node = $reversedList;

            $reversedList = $currentNode;
            $currentNode = $next;
        }
        $this->_firstNode = $reversedList;
    }

    public function display()
    {
        echo "Total Node: ".$this->_totalNode."\n";
        $currentNode = $this->_firstNode;
        while ($currentNode !== null) {
            echo $currentNode->data."\n";
            $currentNode = $currentNode->next_node;
        }
    }

    public function getSize()
    {
        return $this->_totalNode;
    }

    private $_currentPosition = 0;
    private $_currentNode = null;

    public function current()
    {
        return $this->_currentNode->data;
    }

    public function next()
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next_node;
    }

    public function key()
    {
        return $this->_currentPosition;
    }

    public function rewind()
    {
        $this->_currentPosition = 0;
        $this->_currentNode = $this->_firstNode;
    }

    public function valid()
    {
        return $this->_currentNode !== null;
    }
}

$linkedList = new LinkedList();
$linkedList->insert(4);
$linkedList->insert(5);
$linkedList->insert(3);

//读取
echo "Read:".$linkedList->read(1);
echo $linkedList->getNthNode(1)->data.PHP_EOL;

// 查找
echo "Search:".$linkedList->index_of(5).PHP_EOL;

// 插入
$linkedList->insert(8);
$index = 2;
$linkedList->insertAtIndex($index, 100);
echo "Insert value ".$linkedList->read(2)." at $index. ".PHP_EOL;

// 删除
$index = 1;
print "Index $index 's value ".$linkedList->read(1)." Be deleted! ";
//$linkedList->delete(5);
$linkedList->deleteAtIndex(1);
print "Now value's ".$linkedList->read(1).". List's length is ".$linkedList->getSize().PHP_EOL;


echo "//-----------------------// ".PHP_EOL;
$BookTitles = new LinkedList();
$BookTitles->insert("Introduction to Algorithm");
$BookTitles->insert("Introduction to PHP and Data structures");
$BookTitles->insert("Programming Intelligence");
$BookTitles->insertAtFirst("Mediawiki Administrative tutorial guide");
$BookTitles->insertBefore("Introduction to Calculus", "Programming Intelligence");
$BookTitles->insertAfter("Introduction to Calculus", "Programming Intelligence");

//foreach ($BookTitles as $title) {
//    echo $title.PHP_EOL;
//}
echo "//---------PRINT START--------------// ".PHP_EOL;
for ($BookTitles->rewind(); $BookTitles->valid(); $BookTitles->next()) {
    echo $BookTitles->current().PHP_EOL;
}
echo "//---------PRINT OVER--------------// ".PHP_EOL;

$BookTitles->display();
echo "//---------PRINT OVER--------------// ".PHP_EOL;

$BookTitles->deleteFirst();
$BookTitles->deleteLast();
$BookTitles->delete("Introduction to PHP and Data structures");

$BookTitles->display();
echo "//---------REVERSE--------------// ".PHP_EOL;
$BookTitles->reverse();
echo "3nd Item is: ".$BookTitles->getNthNode(3)->data;
