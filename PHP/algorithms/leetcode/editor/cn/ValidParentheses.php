<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。
//
// 有效字符串需满足：
//
//
// 左括号必须用相同类型的右括号闭合。
// 左括号必须以正确的顺序闭合。
//
//
//
//
// 示例 1：
//
//
//输入：s = "()"
//输出：true
//
//
// 示例 2：
//
//
//输入：s = "()[]{}"
//输出：true
//
//
// 示例 3：
//
//
//输入：s = "(]"
//输出：false
//
//
// 示例 4：
//
//
//输入：s = "([)]"
//输出：false
//
//
// 示例 5：
//
//
//输入：s = "{[]}"
//输出：true
//
//
//
// 提示：
//
//
// 1 <= s.length <= 104
// s 仅由括号 '()[]{}' 组成
//
// Related Topics 栈 字符串
// 👍 2425 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class Solution
{

    /**
     * @param  String  $s
     *
     * @return Boolean
     */
    public static function isValid($s)
    {
        $stack = new SplStack();
        $len = strlen($s);

        for ($i = 0; $i < $len; $i++) {
            if ($stack->isEmpty() && in_array($s[$i], [')', '}', ']'])) {
                return false;
            }

            if (in_array($s[$i], ['(', '[', '{'])) {
                $stack->push($s[$i]);
            } elseif (($s[$i] == ')' && $stack->top() == '(') || ($s[$i] == ']' && $stack->top() == '[') || ($s[$i] == '}' && $stack->top() == '{')) {
                $stack->pop();
            } else {
                return false;
            }
        }

        return $stack->isEmpty();
    }
}

//leetcode submit region end(Prohibit modification and deletion)
var_dump(Solution::isValid('()[]{}'));
var_dump(Solution::isValid('(])'));
