package com.example.algorithm;

import java.util.Arrays;

public class Bit {

    /**
     * 判断一个数是否是2的幂次方
     * 所有位中有且仅有一位为 1，把最右1位 设置为0==0
     *
     * @param x
     * @return boolean
     */
    public static boolean is_2_power(int x) {
        // int cannot be converted to boolean
        return (x & (x - 1)) == 0b0;
    }

    /**
     * 统计 1 位数：不断将 x 最右边的 1 置为 0，最后当值为 0 时统计就结束
     *
     * @param x
     * @return int
     */
    public static int count_of_1(int x) {
        int count = 0;
        while (x != 0) {
            x = x & (x - 1);
            count++;
        }
        return count;
    }

    /**
     * 给定一个非负整数 num. 对于 0 ≤ i ≤ num 范围中的每个数字 i, 计算其二进制数中 1 的数目并将它们作为数组返回。输入: 5 输出: [0,1,1,2,1,2]
     *
     * @param x
     */
    public static int[] get_count_1_of_lighter_of_int(int x) {
        int[] bits = new int[x + 1];
        for (int i = 0; i <= x; i++) {
            bits[i] = count_of_1(i);
        }
        return bits;
    }

    /**
     * 在 8×8 格的国际象棋上摆放八个皇后，使其不能互相攻击，即任意两个皇后都不能处于同一行、同一列或同一斜线上，问有多少种摆法
     *
     * @param row
     * @param column
     * @param left
     * @param right
     * @return
     */

    static int count = 0;
    static int[][] result = new int[100][8];

    public static void queenSettle(int row, int column, int left, int right) {
        int N = 8;
        if (row >= N) {
            count++;
            return;
        }

        int[] res = new int[8];
        int bits = (~(column | left | right)) & ((1 << N) - 1);
        while (bits > 0) {
            int p = bits & -bits;
            res[row] = p;
            queenSettle(row + 1, column | p, (left | p) << 1, (right | p) >> 1);
            bits = bits & (bits - 1);
        }
        result[count] = res;
    }


    public static void main(String[] args) {
        System.out.println(count_of_1(0b1101));
        System.out.println(is_2_power(0b100));
        System.out.println(Arrays.toString(get_count_1_of_lighter_of_int(10)));
        queenSettle(0, 0, 0, 0);
        System.out.println(count);

        for (int[] i : result) {
            System.out.println(Arrays.toString(i));
        }

    }
}
// column 10010000|
//         pie 00100000|<<
//         na 00101000|>>
//         01000111