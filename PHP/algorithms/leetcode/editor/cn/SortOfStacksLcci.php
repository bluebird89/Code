<?php

namespace Algorithms\leetcode\editor\cn;

//栈排序。 编写程序，对栈进行排序使最小元素位于栈顶。最多只能使用一个其他的临时栈存放数据，但不得将元素复制到别的数据结构（如数组）中。该栈支持如下操作：pu
//sh、pop、peek 和 isEmpty。当栈为空时，peek 返回 -1。
//
// 示例1:
//
//  输入：
//["SortedStack", "push", "push", "peek", "pop", "peek"]
//[[], [1], [2], [], [], []]
// 输出：
//[null,null,null,1,null,2]
//
//
// 示例2:
//
//  输入：
//["SortedStack", "pop", "pop", "push", "pop", "isEmpty"]
//[[], [], [], [1], [], []]
// 输出：
//[null,null,null,null,null,true]
//
//
// 说明:
//
//
// 栈中的元素数目在[0, 5000]范围内。
//
// Related Topics 设计
// 👍 35 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class SortedStack
{
    private $mainStack;
    private $secondStack;

    /**
     */
    public function __construct()
    {
        $this->mainStack = new SplStack();
        $this->secondStack = new SplStack();
    }

    /**
     * @param  Integer  $val
     *
     * @return NULL
     */
    public function push($val)
    {
        if ($this->isEmpty()) {
            $this->mainStack->push($val);
            return;
        }
        // 出站用法：获取peek后，在pop(),pop() 返回 null
        while (!$this->isEmpty() && ($val > $this->peek())) {
            $this->secondStack->push($this->peek());
            $this->pop();
        }

        $this->mainStack->push($val);
        while (!$this->secondStack->isEmpty()) {
            $this->mainStack->push($this->secondStack->pop());
        }
    }

    /**
     * @return NULL
     */
    public function pop()
    {
        if (!$this->mainStack->isEmpty()) {
            $this->mainStack->pop();
        }
    }

    /**
     * @return Integer
     */
    public function peek()
    {
        return $this->isEmpty() ? -1 : $this->mainStack->top();
    }

    /**
     * @return Boolean
     */
    public function isEmpty()
    {
        return $this->mainStack->isEmpty();
    }
}

/**
 * Your SortedStack object will be instantiated and called as such:
 * $obj = SortedStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->isEmpty();
 */
//leetcode submit region end(Prohibit modification and deletion)

$obj = new SortedStack();
$obj->push(1);
$obj->push(2);
$obj->pop();
var_dump($obj->peek());
var_dump($obj->isEmpty());
