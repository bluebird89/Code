<?php

namespace Algorithms\leetcode\editor\cn;

//三合一。描述如何只用一个数组来实现三个栈。
//
// 实现push(stackNum, value)、pop(stackNum)、isEmpty(stackNum)、peek(stackNum)方法。stackNum表示栈下标，value表示压入的值。
//
// 构造函数会传入一个stackSize参数，代表每个栈的大小。
//
// 示例1:
//
//  输入：
//["TripleInOne", "push", "push", "pop", "pop", "pop", "isEmpty"]
//[[1], [0, 1], [0, 2], [0], [0], [0], [0]]
// 输出：
//[null, null, null, 1, -1, -1, true]
//说明：当栈为空时`pop, peek`返回-1，当栈满时`push`不压入元素。
//
//
// 示例2:
//
//  输入：
//["TripleInOne", "push", "push", "push", "pop", "pop", "pop", "peek"]
//[[2], [0, 1], [0, 2], [0, 3], [0], [0], [0], [0]]
// 输出：
//[null, null, null, null, 2, 1, -1, -1]
//
// Related Topics 设计
// 👍 34 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class TripleInOne
{
    private $size;
    private $data;

    /**
     * @param  Integer  $stackSize
     */
    public function __construct($stackSize)
    {
        $this->size = $stackSize;
    }

    /**
     * @param  Integer  $stackNum
     * @param  Integer  $value
     *
     * @return NULL
     */
    public function push($stackNum, $value)
    {
        if (count($this->data[$stackNum]) >= $this->size) {
            return;
        }
        $this->data[$stackNum][] = $value;
    }

    /**
     * @param  Integer  $stackNum
     *
     * @return Integer
     */
    public function pop($stackNum)
    {
        $val = array_pop($this->data[$stackNum]);

        return isset($val) ? $val : -1;
    }

    /**
     * @param  Integer  $stackNum
     *
     * @return Integer
     */
    public function peek($stackNum)
    {
        $count = count($this->data[$stackNum]);
        return $count ? $this->data[$stackNum][$count - 1] : -1;
    }

    /**
     * @param  Integer  $stackNum
     *
     * @return Boolean
     */
    public function isEmpty($stackNum)
    {
        return count($this->data[$stackNum]) ? false : true;
    }
}

/**
 * Your TripleInOne object will be instantiated and called as such:
 * $obj = TripleInOne($stackSize);
 * $obj->push($stackNum, $value);
 * $ret_2 = $obj->pop($stackNum);
 * $ret_3 = $obj->peek($stackNum);
 * $ret_4 = $obj->isEmpty($stackNum);
 */
//leetcode submit region end(Prohibit modification and deletion)
