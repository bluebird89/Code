package com.example.algorithm.code;

import java.util.Arrays;
import java.util.Collections;
import java.util.Vector;

/**
 * 1：给定一个整数数组 nums 和一个整数目标值 target，请在该数组中找出 和为目标值 的那 两个 整数，并返回它们的数组下标。
 * <p>
 * 输入：nums = [2,7,11,15], target = 9 输出：[0,1]
 * 输入：nums = [3,2,4], target = 6 输出：[1,2]
 * 输入：nums = [3,3], target = 6 输出：[0,1]
 */
public class TwoSum {
    static Vector<Integer> twoSum(Vector<Integer> nums, int target) {
        Vector res = new Vector(2);
        int size = nums.size();
        for (int i = 0; i < size; i++) {
            int another = target - nums.get(i);
            for (int j = i + 1; j < size; j++) {
                if (nums.get(j) == another) {
                    res.add(i);
                    res.add(j);
                }
            }
        }

        return res;
    }

    public static void main(String[] args) {
        Vector nums = new Vector(4);
        nums.addAll(Collections.singleton(new int[]{0, 4, 3, 0}));
        // System.out.println(Arrays.toString(nums.toArray()));
        System.out.println(Arrays.toString(nums.toArray()));
    }
}
