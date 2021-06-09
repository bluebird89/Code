<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个包含正整数、加(+)、减(-)、乘(*)、除(/)的算数表达式(括号除外)，计算其结果。
//
// 表达式仅包含非负整数，+， - ，*，/ 四种运算符和空格 。 整数除法仅保留整数部分。
//
// 示例 1:
//
// 输入: "3+2*2"
//输出: 7
//
//
// 示例 2:
//
// 输入: " 3/2 "
//输出: 1
//
// 示例 3:
//
// 输入: " 3+5 / 2 "
//输出: 5
//
//
// 说明：
//
//
// 你可以假设所给定的表达式都是有效的。
// 请不要使用内置的库函数 eval。
//
// Related Topics 字符串
// 👍 41 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class Solution
{

    /**
     * @param  String  $s
     *
     * @return Integer
     */
    public function calculate($s)
    {
        $arr = str_split($s);
        $count = count($arr);
        $nums = new SplStack();
        $operators = new SplStack();
        for ($i = 0; $i < $count; $i++) {
            if (in_array($arr[$i], ['+', '-', '*', '/'])) {
                $operators->push($arr[$i]);
            } else {
                // 多位数分析
                $val = $arr[$i];
                while ($i < $count - 1 && is_numeric($arr[$i + 1])) {
                    $next_val = $arr[$i + 1];
                    $val = $val * 10 + $next_val;
                    $i++;
                }
                $nums->push($val);
            }
        }

        while (!$operators->isEmpty()) {
            $first_num = $nums->top();
            $nums->pop();
            $second_num = $nums->top();
            $nums->pop();

            $operator = $operators->top();
            $nums->pop();
            if (in_array($operators->top(), ['*', '/'])) {
                // TODO: execute an string
                $nums->push(exec($first_num.$operator.$second_num));
            } else {
                $nums->push(exec($first_num.$operator.$second_num));
            }
        }

        return $nums[0];
    }
}

//leetcode submit region end(Prohibit modification and deletion)

$var = new Solution();
var_dump($var->calculate('3+21*2'));
