<?php

/*
 * 给你一个整数数组 nums ，其中可能包含重复元素，请你返回该数组所有可能的子集（幂集）。

解集 不能包含重复的子集。返回的解集中，子集可以按 任意顺序 排列
输入：nums = [1,2,2]
输出：[[],[1],[1,2],[1,2,2],[2],[2,2]]
 */

class Solution
{
    /**
     * @param  Integer[]  $nums
     *
     * @return Integer[][]
     */
    public function subsetsWithDup($nums)
    {
        $results = [];
        $count = count($nums);
        // 控制长度
        $result_1 = [];
        $result_2 = [];
        for ($i = 0; $i < $count; $i++) {
            array_push($results, $result_1);
            array_push($result_1, $nums[$i]);
            for ($j = $i + 1; $j < $count && (count($result) < $count); $j++) {
                array_push($result, $nums[$j]);
                array_push($results, $result);
            }
        }

        return $results;
    }
}

var_dump((new Solution())->subsetsWithDup([1, 2, 2]));
