package com.example.tdd.data;

import com.example.algorithm.Fibonacci;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

class FibonacciTest {
    @Test
    void fib() {
        assertEquals(0, new Fibonacci().Fib(0));
        assertEquals(1, new Fibonacci().Fib(1));

        int[][] cases = {{0, 0}, {1, 1}, {2, 1}};

        for (int i = 0; i < cases.length;
             i++) {
            assertEquals(cases[i][1], new Fibonacci().Fib(cases[i][0]));
        }
    }

}