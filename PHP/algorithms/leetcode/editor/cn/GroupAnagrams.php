<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个字符串数组，将字母异位词组合在一起。字母异位词指字母相同，但排列不同的字符串。
//
// 示例:
//
// 输入: ["eat", "tea", "tan", "ate", "nat", "bat"]
//输出:
//[
//  ["ate","eat","tea"],
//  ["nat","tan"],
//  ["bat"]
//]
//
// 说明：
//
//
// 所有输入均为小写字母。
// 不考虑答案输出的顺序。
//
// Related Topics 哈希表 字符串
// 👍 760 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param String[] $strs
     * @return String[][]
     */
    public function groupAnagrams($strs)
    {
        $reses = [];
        $len = count($strs);
        $labels = array_fill(1, $len, false);
        for ($i = 0; $i < $len; $i++) {
            if ($labels[$i] == true) {
                continue;
            }
            $res = [$strs[$i]];
            for ($j = $i + 1; $j < $len; $j++) {
                if ($labels[$j] == true) {
                    continue;
                }
                if ($this->strIsANagrams($strs[$i], $strs[$j])) {
                    $res[] = $strs[$j];
                    $labels[$j] = true;
                }
            }
            $reses[] = $res;
        }

        return $reses;
    }

    public function strIsANagrams($s, $t)
    {
        $s_len = strlen($s);
        $t_len = strlen($t);
        if ($s_len != $t_len) {
            return false;
        }

        $res = [];
        for ($i = 0; $i < $s_len; $i++) {
            $offset = isset($res[$s[$i]]) ? $res[$s[$i]] + 1 : 0;
            $index = strpos($t, $s[$i], $offset);

            if ($index === false) {
                return false;
            }

            $res[$s[$i]] = $index;
        }

        return true;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];
//print_r((new Solution())->groupAnagrams($strs));
$strs = ["", "", ""];
print_r((new Solution())->groupAnagrams($strs));
$strs = ["h", "h", "h"];
print_r((new Solution())->groupAnagrams($strs));
$strs = ["ddddddddddg", "dgggggggggg"];
print_r((new Solution())->groupAnagrams($strs));
