<?php

class Solution
{
    /**
     * @param  Integer[]  $nums
     * @param  Integer    $target
     *
     * @return Integer[]
     */
    public function twoSum($nums, $target)
    {
        $rs = [];
        foreach ($nums as $first => $num) {
            if ($num >= $target) {
                continue;
            }
            foreach ($nums as $second => $value) {
                if ($value == $target - $num) {
                    return [$first, $second];
                }
            }
        }
        return $rs;
    }
}

echo printArray((new Solution())->twoSum([2, 7, 11, 15], 9));

function printArray(array $arr): string
{
    $out = "[";
    foreach ($arr as $k => $v) {
        $out .= $v;
        if (isset($arr[$k + 1])) {
            $out .= ",";
        }
    }

    $out .= "]";
    return $out;
}
