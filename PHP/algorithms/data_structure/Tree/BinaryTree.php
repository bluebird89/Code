<?php


namespace Algorithms\Tree;

include '../../vendor/autoload.php';

class BinaryTree
{
    public $root = null;

    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }

    /**
     * @param  int         $value
     * @param  BinaryNode  $node
     *
     * @return BinaryNode|bool
     */
    public static function search($value, BinaryNode $node)
    {
        if ($node == null || $node->data == $value) {
            return $node;
        } elseif ($value < $node->data) {
            return static::search($value, $node->leftChild);
        } elseif ($value > $node->data) {
            return static::search($value, $node->rightChild);
        }

        return false;
    }

    public static function insert($value, BinaryNode $node)
    {
        if ($value < $node->data) {
            if ($node->leftChild == null) {
                $node->leftChild = new BinaryNode($value);
            } else {
                static::insert($value, $node->leftChild);
            }
        } elseif ($value > $node->data) {
            if ($node->rightChild == null) {
                $node->rightChild = new BinaryNode($value);
            } else {
                static::insert($value, $node->rightChild);
            }
        }
    }

    /*
     * 删除
     */
    public static function delete($value, BinaryNode $node)
    {
        if ($node == null) {
            return null;
        } elseif ($value < $node->leftChild->data) {
            $node->leftChild = self::delete($value, $node->leftChild);
            return $node;
        } elseif ($value > $node->rightChild->data) {
            $node->rightChild = self::delete($value, $node->rightChild);
            return $node;
        } elseif ($value == $node->data) {
            if ($node->leftChild == null) {
                return $node->rightChild;
            } elseif ($node->rightChild == null) {
                return $node->leftChild;
            } else {
                $node->rightChild = static::lift($node->rightChild, $node);
                return $node;
            }
        }
    }

    public static function lift($node, $nodeToDelete)
    {
        if ($node->leftChild) {
            $node->leftChild = static::lift($node->leftChild, $nodeToDelete);
            return $node;
        } else {
            $nodeToDelete->data = $node->data;
            return $node->rightChild;
        }
    }

    /*
     * 前序遍历
     */
    public function preTraverse(BinaryNode $node, int $level = 0)
    {
        if ($node) {
            echo str_repeat("-", $level);
            echo $node->data.PHP_EOL;
            if ($node->leftChild) {
                $this->preTraverse($node->leftChild, $level + 1);
            }
            if ($node->rightChild) {
                $this->preTraverse($node->rightChild, $level + 1);
            }
        }
    }

    /*
      * 中序遍历
      */
    public function midTraverse(BinaryNode $node, int $level = 0)
    {
        if ($node) {
            echo str_repeat("-", $level);
            if ($node->leftChild) {
                $this->midTraverse($node->leftChild, $level + 1);
            }
            echo $node->data.PHP_EOL;
            if ($node->rightChild) {
                $this->midTraverse($node->rightChild, $level + 1);
            }
        }
    }

    /*
    * 后序遍历
    */
    public function afterTraverse(BinaryNode $node, int $level = 0)
    {
        if ($node) {
            echo str_repeat("-", $level);
            if ($node->leftChild) {
                $this->afterTraverse($node->leftChild, $level + 1);
            }
            if ($node->rightChild) {
                $this->afterTraverse($node->rightChild, $level + 1);
            }
            echo $node->data.PHP_EOL;
        }
    }
}

echo "/-----构造树--------/ ".PHP_EOL;
$root = new BinaryNode(5);
$node = new BinaryNode(1, $root);
$node1 = new BinaryNode(10, $root);
$root->addChildren($node, $node1);

echo "Max:".$root->max()->data.PHP_EOL;
echo "Min:".$root->min()->data.PHP_EOL;
echo "/-----构造树 over--------/ ".PHP_EOL;

echo BinaryTree::search(10, $root)->data.PHP_EOL;
BinaryTree::insert(3, $root);
echo BinaryTree::search(3, $root)->data.PHP_EOL;
var_dump(BinaryTree::delete(10, $root));

echo "/-----构造字符串树 over--------/ ".PHP_EOL;
$final = new BinaryNode("Final");
$semiFinal1 = new BinaryNode("Semi Final 1");
$semiFinal2 = new BinaryNode("Semi Final 2");
$quarterFinal1 = new BinaryNode("Quarter Final 1");
$quarterFinal2 = new BinaryNode("Quarter Final 2");
$quarterFinal3 = new BinaryNode("Quarter Final 3");
$quarterFinal4 = new BinaryNode("Quarter Final 4");
$semiFinal1->addChildren($quarterFinal1, $quarterFinal2);
$semiFinal2->addChildren($quarterFinal3, $quarterFinal4);
$final->addChildren($semiFinal1, $semiFinal2);

$tree = new BinaryTree($final);
$tree->traverse($tree->root);
