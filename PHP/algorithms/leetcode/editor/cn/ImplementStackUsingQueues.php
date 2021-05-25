<?php

namespace Algorithms\leetcode\editor\cn;

//请你仅使用两个队列实现一个后入先出（LIFO）的栈，并支持普通队列的全部四种操作（push、top、pop 和 empty）。
//
// 实现 MyStack 类：
//
//
// void push(int x) 将元素 x 压入栈顶。
// int pop() 移除并返回栈顶元素。
// int top() 返回栈顶元素。
// boolean empty() 如果栈是空的，返回 true ；否则，返回 false 。
//
//
//
//
// 注意：
//
//
// 你只能使用队列的基本操作 —— 也就是 push to back、peek/pop from front、size 和 is empty 这些操作。
// 你所使用的语言也许不支持队列。 你可以使用 list （列表）或者 deque（双端队列）来模拟一个队列 , 只要是标准的队列操作即可。
//
//
//
//
// 示例：
//
//
//输入：
//["MyStack", "push", "push", "top", "pop", "empty"]
//[[], [1], [2], [], [], []]
//输出：
//[null, null, null, 2, 2, false]
//
//解释：
//MyStack myStack = new MyStack();
//myStack.push(1);
//myStack.push(2);
//myStack.top(); // 返回 2
//myStack.pop(); // 返回 2
//myStack.empty(); // 返回 False
//
//
//
//
// 提示：
//
//
// 1 <= x <= 9
// 最多调用100 次 push、pop、top 和 empty
// 每次调用 pop 和 top 都保证栈不为空
//
//
//
//
// 进阶：你能否实现每种操作的均摊时间复杂度为 O(1) 的栈？换句话说，执行 n 个操作的总时间复杂度 O(n) ，尽管其中某个操作可能需要比其他操作更长的
//时间。你可以使用两个以上的队列。
// Related Topics 栈 设计
// 👍 326 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplQueue;

/**
 * Class MyStack
 *
 * @package Algorithms\leetcode\editor\cn
 *
 * tips:举实例
 * 1->1
 * 1：2->2：1
 * 1：2:3->3:2:1
 */
class MyStack
{
    // 不要声明类型，否则测试报错
    private $queue1;
    private $queue2;

    /**
     * Initialize your data structure here.
     */
    public function __construct()
    {
        $this->queue1 = new SplQueue();
        $this->queue2 = new SplQueue();
    }

    /**
     * Push element x onto stack.
     *
     * @param  Integer  $x
     *
     * @return NULL
     */
    public function push(int $x)
    {
        $this->queue1->enqueue($x);
        while (!$this->queue2->isEmpty()) {
            $this->queue1->enqueue($this->queue2->dequeue());
        }
        $this->queue2 = $this->queue1;
        $this->queue1 = new SplQueue();
    }

    /**
     * Removes the element on top of the stack and returns that element.
     *
     * @return Integer
     */
    public function pop()
    {
        if ($this->empty()) {
            return -1;
        }
        return $this->queue2->dequeue();
    }

    /**
     * Get the top element.
     *
     * @return Integer
     */
    public function top()
    {
        return $this->queue2->bottom();
    }

    /**
     * Returns whether the stack is empty.
     *
     * @return Boolean
     */
    public function empty()
    {
        return $this->queue2->isEmpty();
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */
//leetcode submit region end(Prohibit modification and deletion)
$obj = new MyStack();
$obj->push(1);
$obj->push(2);
echo $obj->top();
echo $obj->pop();
var_dump($obj->empty());
