<?php


namespace Algorithms\data_structure\Tree;

include '../../../vendor/autoload.php';

class BinaryNode
{
    public $data;
    public $leftChild;
    public $rightChild;
    public $parent;

    public function __construct($data = null, BinaryNode $parent = null)
    {
        $this->data = $data;
        $this->parent = $parent;
        $this->leftChild = null;
        $this->rightChild = null;
    }

    public function addChildren(BinaryNode $leftChild, BinaryNode $rightChild)
    {
        $this->leftChild = $leftChild;
        $this->rightChild = $rightChild;
    }

    public function min()
    {
        $node = $this;
        while ($node->leftChild) {
            $node = $node->leftChild;
        }
        return $node;
    }

    public function max()
    {
        $node = $this;
        while ($node->rightChild) {
            $node = $node->rightChild;
        }

        return $node;
    }

    /*
     *  后继结点：所有比当前结点大的子结点中，最小的那个
     */
    public function successor()
    {
        $node = $this;
        if ($node->rightChild) {
            return $node->rightChild->min();
        } else {
            return null;
        }
    }

    public function predecessor()
    {
        $node = $this;
        if ($node->leftChild) {
            return $node->leftChild->max();
        } else {
            return null;
        }
    }

    public function delete()
    {
        $node = $this;
        if (!$node->leftChild && !$node->rightChild) {
            if ($node->parent->leftChild === $node) {
                $node->parent->leftChild = null;
            } else {
                $node->parent->rightChild = null;
            }
        } elseif ($node->leftChild && $node->rightChild) {
            $successor = $node->successor();
            $node->data = $successor->data;
            $successor->delete();
        } elseif ($node->leftChild) {
            if ($node->parent->leftChild === $node) {
                $node->parent->left = $node->leftChild;
                $node->leftChild->parent = $node->parent->left;
            } else {
                $node->parent->rightChild = $node->leftChild;
                $node->leftChild->parent = $node->parent->rightChild;
            }
            $node->leftChild = null;
        } elseif ($node->rightChild) {
            if ($node->parent->leftChild === $node) {
                $node->parent->left = $node->rightChild;
                $node->rightChild->parent = $node->parent->left;
            } else {
                $node->parent->rightChild = $node->rightChild;
                $node->rightChild->parent = $node->parent->rightChild;
            }
            $node->rightChild = null;
        }
    }
}
