<?php

namespace Algorithms\Tree;

class BinarySortedTree extends BT
{
    /**
     * @var BinaryNode
     */
    private $tree;

    public function getTree()
    {
        return $this->tree;
    }

    public function insert(int $data)
    {
        // 如果是空树，则将数据插入到根节点
        if (!$this->tree) {
            $this->tree = new BinaryNode($data);
            return;
        }
        $p = $this->tree;
        while ($p) {
            if ($data < $p->data) {
                if (!$p->left) {
                    $p->left = new BinaryNode($data);
                    return;
                }
                $p = $p->left;
            } elseif ($data > $p->data) {
                if (!$p->right) {
                    $p->right = new BinaryNode($data);
                    return;
                }
                $p = $p->right;
            }
        }
    }
}
