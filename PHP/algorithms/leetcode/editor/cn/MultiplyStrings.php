<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个以字符串形式表示的非负整数 num1 和 num2，返回 num1 和 num2 的乘积，它们的乘积也表示为字符串形式。
//
// 示例 1:
//
// 输入: num1 = "2", num2 = "3"
//输出: "6"
//
// 示例 2:
//
// 输入: num1 = "123", num2 = "456"
//输出: "56088"
//
// 说明：
//
//
// num1 和 num2 的长度小于110。
// num1 和 num2 只包含数字 0-9。
// num1 和 num2 均不以零开头，除非是数字 0 本身。
// 不能使用任何标准库的大数类型（比如 BigInteger）或直接将输入转换为整数来处理。
//
// Related Topics 数学 字符串
// 👍 644 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * TODO:change str to storage result
     * @param String $num1
     * @param String $num2
     *
     * @return String
     */
    public function multiply($num1, $num2)
    {
        $num1_len = strlen($num1);
        $num2_len = strlen($num2);
        $result = 0;

        $label = 0;
        // mun2 被乘数
        for ($i = $num2_len - 1; $i >= 0; $i--) {
            $num2_digit = $this->str_to_int($num2, $i);

            $tmp = 0;
            // mun1 乘数
            for ($j = $num1_len - 1; $j >= 0; $j--) {
                $num1_digit = $this->str_to_int($num1, $j);
                // 第一个乘数是一位时
                if ($num1_len == 1) {
                    $tmp = $num1[0] * $num2_digit + $label;
                    continue;
                }

                $val = $num1_digit * $num2_digit + $label;
                $label = (int)floor($val / 10);
                $tmp += $val % 10 * pow(10, $num1_len - 1 - $j);
            }

            // 一轮下来 $label exist add to most upper
            if ($label) {
                $tmp += (int)$label * pow(10, $num1_len);
                $label = 0;
            }
            var_dump($tmp);
            $result += $tmp * pow(10, $num2_len - 1 - $i);
        }
        return $result;
        $str = '';
        $result = (string)($result);
        $count = strlen($result);
        for ($i = 0; $i < $count; $i++) {
            $str .= (string)$result[$i];
        }

        return $str;
    }

    public function str_to_int($str, $index)
    {
        return $str[$index] + '0';
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo 123 * 456 . PHP_EOL;//var_dump('1' + '0');
var_dump((new Solution())->multiply('123', '456'));
var_dump((new Solution())->multiply('9', '9'));
var_dump((new Solution())->multiply('98', '9'));
var_dump((new Solution())->multiply('999', '999'));
var_dump((new Solution())->multiply("123456789", "987654321"));
var_dump((new Solution())->multiply("498828660196", "840477629533"));
var_dump(419254329864656431168468);
//var_dump(8*pow(10, 3));
