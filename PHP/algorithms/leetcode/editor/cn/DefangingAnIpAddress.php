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
     * @param String $address
     *
     * @return String
     */
    public function defangIPaddr0($address)
    {
        $res = '';
        while ($pos = strpos($address, '.')) {
            $res .= substr($address, 0, $pos) . '[.]';
            $address = substr($address, $pos + 1);
        }

        return $res . $address;
    }

    public function defangIPaddr($address)
    {
        $pos = 0;
        $count = 0;

        while ($count < 3) {
            $pos = strpos($address, '.', $pos);
            $address = substr($address, 0, $pos) . '[.]' . substr($address, $pos + 1);

            $pos += 2;
            $count++;
        }
        return $address;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
//echo (new Solution)->defangIPaddr('192.168.0.1') . PHP_EOL;
//echo (new Solution)->defangIPaddr('1.1.1.1') . PHP_EOL;
echo (new Solution)->defangIPaddr('227.222.40.237') . PHP_EOL;
