<?php

namespace Algorithms\leetcode\editor\cn;

//用两个栈实现一个队列。队列的声明如下，请实现它的两个函数 appendTail 和 deleteHead ，分别完成在队列尾部插入整数和在队列头部删除整数的
//功能。(若队列中没有元素，deleteHead 操作返回 -1 )
//
//
//
// 示例 1：
//
// 输入：
//["CQueue","appendTail","deleteHead","deleteHead"]
//[[],[3],[],[]]
//输出：[null,null,3,-1]
//
//
// 示例 2：
//
// 输入：
//["CQueue","deleteHead","appendTail","appendTail","deleteHead","deleteHead"]
//[[],[],[5],[2],[],[]]
//输出：[null,-1,null,null,5,2]
//
//
// 提示：
//
//
// 1 <= values <= 10000
// 最多会对 appendTail、deleteHead 进行 10000 次调用
//
// Related Topics 栈 设计
// 👍 233 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class CQueue
{
    private $stack1 = [];
    private $stack2 = [];

    /**
     * 数据结构正确:测试用例会验证
     */
    public function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    /**
     * @param  Integer  $value
     *
     * @return NULL
     */
    public function appendTail(int $value)
    {
        $this->stack1->push($value);
    }

    /**
     * @return Integer
     */
    public function deleteHead()
    {
        if (count($this->stack1) == 0) {
            return -1;
        } else {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
            $value = $this->stack2->pop();
            while (!$this->stack2->isEmpty()) {
                $this->stack1->push($this->stack2->pop());
            }

            return $value;
        }
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */
//leetcode submit region end(Prohibit modification and deletion)
$obj = new CQueue();
$obj->appendTail(3);
echo $obj->deleteHead();
echo $obj->deleteHead();

$obj->appendTail(4);
echo $obj->deleteHead();
