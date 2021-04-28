package com.example.tdd.data;

import com.example.algorithm.Caculator;
import org.junit.jupiter.api.AfterEach;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

class CaculatorTest {
    @BeforeEach
    void setUp() {
    }

    @AfterEach
    void tearDown() {
    }

    @Test
    void add() {
        assertEquals(6, new Caculator().add(3, 3));
    }

    @Test
    void subtract() {
        assertEquals(3, new Caculator().subtract(5, 2));
    }

    @Test
    void multiply() {
        assertEquals(10, new Caculator().multiply(5, 2));
    }

    @Test
    void divide() {
        assertEquals(3, new Caculator().divide(6, 2));

    }

    @Test
    void failture() {
        assertEquals(6, new Caculator().add(3, 3));
    }

    @Test
    void error() {
        assertEquals(3, new Caculator().divide(6, 2));
    }

}
