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
        $count = count($strs);
        $strsLabel = [];
        // 标志位
        foreach ($strs as $str) {
            $strsLabel[$str] = false;
        }
        $res = [];

        for ($i = 0; $i < $count - 1; $i++) {
            if ($strsLabel[$strs[$i]] == true) {
                continue;
            }

            $strArr[] = $strs[$i];
            $strlen = strlen($strs[$i]);
            for ($j = $i + 1; $j < $count; $j++) {
                if (($strlen == strlen($strs[$j])) && ($this->strIsANagrams($strs[$i], $strs[$j]))) {
                    if (($strsLabel[$strs[$j]] == false) || $strs[$i] == $strs[$j]) {
                        $strArr[] = $strs[$j];
                        $strsLabel[$strs[$j]] = true;
                    }
                }
            }

            $res[] = $strArr;
            unset($strArr);
        }
        if ($strsLabel[$strs[$count - 1]] == false) {
            $res[] = [$strs[$count - 1]];
        }

        return $res;
    }

    public function strIsANagrams($str1, $str2)
    {
        $strlen = strlen($str1);
        for ($k = 0; $k < $strlen; $k++) {
            if (strpos($str1, $str2[$k]) === false) {
                return false;
            }
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
