package com.example.tdd;

/**
 * @author henry
 */
public class Calculator {
    public int result = 0;

    public int add(int operand1, int operand2) {
        result = operand1 + operand2;

        return result;
    }

    public int subtract(int operand1, int operand2) {
        result = operand1 - operand2;
        return result;
    }

    public int multiply(int operand1, int operand2) {
        result = operand1 * operand2;
        return result;
        // for (; ; ) {                    //死循环
        // }
    }

    public int divide(int operand1, int operand2) {
        result = operand1 / operand2;
        return result;
    }

    public int getResult() {
        return this.result;
    }
}
