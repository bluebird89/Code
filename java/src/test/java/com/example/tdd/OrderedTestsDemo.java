package com.example.tdd;

import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.MethodOrderer.OrderAnnotation;
import org.junit.jupiter.api.Order;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.api.TestMethodOrder;

@TestMethodOrder(OrderAnnotation.class)
class OrderedTestsDemo {
    @Test
    @Order(1)
    void nullValues() {
// perform assertions against null values
    }

    @Test
    @Order(4)
    void emptyValues() {
// perform assertions against empty values
    }

    @Test
    @Order(3)
    void validValues() {
// perform assertions against valid values
    }

    public static class MathToolsTest {
        @Test
        public void testConvertToDecimalSuccess() {
            double result = MathTools.convertToDecimal(3, 4);
            Assertions.assertEquals(0.75, result);
        }

        // @Test
        // public void testConvertToDecimalInvalidDenominator() {
        //     Assertions.assertThrows(IllegalArgumentException.class, () -> MathTools.convertToDecimal(3, 0));
        // }
    }
}
