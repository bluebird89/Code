<?php

/*
 * 动态规划
 */

//自顶向下的备忘录法
// 使用递归，会产生额外的开销
function fibonacci($n)
{
    if ($n <= 0) {
        return $n;
    }
    $memo = [];
    for ($i = 0; $i <= $n; $i++) {
        $memo[$i] = -1;
    }

    return fib($n, $memo);
}

function fib($n, &$memo)
{
    if ($memo[$n] != -1) {
        return $memo[$n];
    }

    if ($n <= 2) {
        $memo[$n] = 1;
    } else {
        $memo[$n] = fib($n - 1, $memo) + fib($n - 2, $memo);
    }

    return $memo[$n];
}

echo fibonacci(10).PHP_EOL;

//自底向上的动态规划
function fib2($n)
{
    if ($n <= 0) {
        return $n;
    }
    $memo_i = 0;
    $memo_i_1 = 1;
    $memo_i_2 = 1;
    for ($i = 3; $i <= $n; $i++) {
        $memo_i = $memo_i_1 + $memo_i_2;
        $memo_i_2 = $memo_i_1;
        $memo_i_1 = $memo_i;
    }

    return $memo_i;
}

echo fib2(10).PHP_EOL;

/*
 * 一个楼梯有 10 级台阶，你从下往上走，每跨一步只能向上迈 1 级或者 2 级台阶，请问一共有多少种走法？
 */

function getWays(int $n)
{
    if ($n == 1) {
        return 1;
    }
    if ($n == 2) {
        return 2;
    }
    return getWays($n - 1) + getWays($n - 2);
}

function getWays2(int $n)
{
    if ($n == 1) {
        return 1;
    }
    if ($n == 2) {
        return 2;
    }
    $a = 1;
    $b = 2;
    $temp = 0;
    for ($i = 3; $i <= $n; $i++) {
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }

    return $temp;
}

/*
 * 有一个背包，可以装载重量为 5kg 的物品。有 4 个物品，重量和价值如 1kg $3、2kg  ¥4 、3kg $5 、4kg $6
 * 在不得超过背包的承重的情况下，将哪些物品放入背包，可以使得总价值最大
 * F(5,4) = max { F(1, 3) + 6，F(5, 3) }
 * F(W,N) = max { F(W-wn, N-1) + vn，F(W, N-1) }
 */

function package($goods, $weight)
{
    $remained = $weight;
    $result = 0;

    for ($i = count($goods); $i >= 1; $i--) {
        if (isset($goods[$i]) && $remained - $i == $i - 1) {
            $remained -= $i;
            $result += $goods[$i];
        }
    }
    return $result;
}

$values = [1 => 3, 2 => 4, 3 => 5, 4 => 6];
echo "Max value:".package($values, 5);

//钢条切割
function cut($prices, $length)
{
    if ($length == 0) {
        return 0;

    }

    $rs = 0;
    for ($i = 1; $i <= $length; $i++) {
        $rs = max($rs, $prices[$i - 1] + cut($prices, $length - $i));
    }

    return $rs;
}

$prices = [0 => 0, 1 => 1, 2 => 5, 3 => 8, 4 => 9, 5 => 10, 6 => 17, 7 => 17, 8 => 20, 9 => 24, 10 => 30];
//echo cut($prices, 20);
