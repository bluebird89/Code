package com.example.syntax;

import java.util.Arrays;
import java.util.List;

public class ReferenceDataType {
    public static void main(String[] args) {
        // 引用类型
        String s = "hello";
        int[] intArray = new int[9];
        double[][] doubleArray = new double[100][20];
        System.out.println(intArray[2]);
        System.out.println(doubleArray[20][10]);

        // List lst = new List {
        //     3, 5, 6, 8
        // }

        int[] array = {1, 2, 3, 4, 5};
        for (int i = 0; i < array.length; i++) {
            System.out.println(array[i]);
        }
        for (int a : array)
            System.out.println(a);

        System.out.println(Arrays.toString(array));


        // 说明：System.out.println(array);这样是不行的，这样打印是的是数组的首地址。


        // 二维数组：
        int[][] magicSquare =
                {
                        {16, 3, 2, 13},
                        {5, 10, 11, 8},
                        {9, 6, 7, 3}
                };

        // Java实际没有多维数组，只有一维数组，多维数组被解读为"数组的数组"，例如二维数组magicSquare是包含{magicSquare[0]，magicSquare[1]，magicSquare[2]}三个元素的一维数组，magicSqure[0]是包含{16,3,2,13}四个元素的一维数组，同理magicSquare[1]，magicSquare[2]也一样。
        for (int i = 0; i < magicSquare.length; i++) {
            for (int j = 0; j < magicSquare[i].length; j++) {
                System.out.print(magicSquare[i][j] + " ");
            }
            System.out.println();    //换行
        }

        for (int[] a : magicSquare) {
            for (int b : a) {
                System.out.print(b + " ");
            }
            System.out.println();//换行
        }

        for (int i = 0; i < magicSquare.length; i++)
            System.out.println(Arrays.toString(magicSquare[i]));
    }
}
