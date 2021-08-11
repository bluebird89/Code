package com.example.math;

import java.util.Arrays;

public class MergeSort {
    public static int[] merge_sort(int[] to_sort) {
        if (to_sort == null) {
            return new int[0];
        }

        if (to_sort.length == 1) return to_sort;

        int mid = to_sort.length / 2;
        int[] left = Arrays.copyOfRange(to_sort, 0, mid);
        int[] right = Arrays.copyOfRange(to_sort, mid, to_sort.length);

        left = merge_sort(left);
        right = merge_sort(right);

        return merge(left, right);
    }

    private static int[] merge(int[] left, int[] right) {
        if (left == null) left = new int[0];
        if (right == null) right = new int[0];

        int[] merged = new int[left.length + right.length];
        int lefti = 0, righti = 0, mi = 0;

        while (lefti < left.length && righti < right.length) {
            if (left[lefti] <= right[righti]) {
                merged[mi] = left[lefti];
                lefti++;
            } else {
                merged[mi] = right[righti];
                righti++;
            }
            mi++;
        }

        while (lefti < left.length) {
            merged[mi] = left[lefti];
            lefti++;
            mi++;
        }

        while (righti < right.length) {
            merged[mi] = right[righti];
            righti++;
            mi++;
        }

        return merged;
    }

    public static void main(String[] args) {
        int[] sorted = merge_sort(new int[]{7, 6, 2, 4, 1, 9, 3, 8, 0, 5});
        for (int j : sorted) {
            System.out.println(j);
        }
    }
}
