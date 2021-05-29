<?php
//
//void backtrack(int[] nums, LinkedList<Integer> track) {
//    if (track.size() == nums.length) {
//        res.add(new LinkedList(track));
//        return;
//    }
//
//    for (int i = 0; i < nums.length; i++) {
//        if (track.contains(nums[i]))
//            continue;
//        track.add(nums[i]);
//        // 进入下一层决策树
//        backtrack(nums, track);
//        track.removeLast();
//    }
//
///* 提取出 N 叉树遍历框架 */
//void backtrack(int[] nums, LinkedList<Integer> track) {
//        for (int i = 0; i < nums.length; i++) {
//            backtrack(nums, track);
//        }
