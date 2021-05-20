<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个有效的 IPv4 地址 address，返回这个 IP 地址的无效化版本。
//
// 所谓无效化 IP 地址，其实就是用 "[.]" 代替了每个 "."。
//
//
//
// 示例 1：
//
// 输入：address = "1.1.1.1"
//输出："1[.]1[.]1[.]1"
//
//
// 示例 2：
//
// 输入：address = "255.100.50.0"
//输出："255[.]100[.]50[.]0"
//
//
//
//
// 提示：
//
//
// 给出的 address 是一个有效的 IPv4 地址
//
// Related Topics 字符串
// 👍 66 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  String  $address
     *
     * @return String
     */
    public static function defangIPaddr($address)
    {
        $token = strtok(".", $address);
        $res = '';
        while ($pos = strpos($address, '.')) {
            echo $pos.PHP_EOL;
            $str = substr($address, 0, $pos);
            echo $str.PHP_EOL;
            $res .= $str.'[.]';
            $address = substr($address, $pos + 1);
        }
        $res .= $address;
        return $res;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo Solution::defangIPaddr('192.168.0.1');
