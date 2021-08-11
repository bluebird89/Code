package com.example.math;

import java.util.ArrayList;
import java.util.Arrays;

public class Combination {

    /**
     * @param teams-目前还剩多少队伍没有参与组合，result-保存当前已经组合的队伍
     * @return void
     * @Description: 使用函数的递归（嵌套）调用，找出所有可能的队伍组合
     */

    public static void combine(ArrayList<String> teams, ArrayList<String> result, int m) {

        // 挑选完m个元素，输出结果
        if (result.size() == m) {
            System.out.println(result);
            return;
        }

        for (int i = 0; i < teams.size(); i++) {
            // 从剩下的队伍中，选择一队，加入结果
            ArrayList<String> newResult = (ArrayList<String>) (result.clone());
            newResult.add(teams.get(i));

            // 只考虑当前选择之后的所有队伍
            ArrayList<String> rest_teams = new ArrayList<String>(teams.subList(i + 1, teams.size()));

            // 递归调用，对于剩余的队伍继续生成组合
            combine(rest_teams, newResult, m);
        }
    }

    public static void main(String[] args) {
        ArrayList<String> teams = new ArrayList<String>(Arrays.asList("t1", "t2", "t3"));
        combine(teams, new ArrayList<String>(), 2);

        int[][] c = C(new int[]{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}, 3, 0);
        for (int[] cc : c) {
            System.out.println(Arrays.toString(cc));
        }
    }

    /**
     * 求组合情况  总共10人，一等名1名，二等奖2名，三等3名
     *
     * @param es
     * @param r
     * @param I  数组es开始取数位置
     * @return
     */
    static int[][] C(int[] es, int r, int I) {
        // int[][] rst = new int[c(es.length - I, r)][];
        int[][] rst = new int[es.length - I][];
        if (r == 1) {
            for (int rsti = 0; rsti < rst.length; rsti++, I++) {
                rst[rsti] = new int[]{es[I]};
            }
        }

        for (int rsti = 0; I < es.length; I++) {
            int[][] srst = C(es, r - 1, I + 1);
            for (int[] sc : srst) {
                int[] t = rst[rsti] = new int[sc.length + 1];
                t[0] = es[I];
                System.arraycopy(sc, 0, t, 1, sc.length);
                rsti++;
            }
        }

        return rst;
    }
}
