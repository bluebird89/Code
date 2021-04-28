package com.example.tdd;

import org.junit.jupiter.api.*;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.fail;
import static org.junit.jupiter.api.Assumptions.assumeTrue;

/**
 * @author henry
 */
@DisplayName("A special test case")
class CalculatorTest {

    private final Calculator calculator = new Calculator();

    @BeforeAll
    public static void initAll() throws Exception {
        System.out.println("@BeforeAll");
    }

    @AfterAll
    public static void tearDownAll() throws Exception {
        System.out.println("@AfterAll");
    }

    @BeforeEach
    public void init() throws Exception {
        System.out.println("方法测试开始");
    }

    @Test
    @DisplayName("Custom test name containing spaces")
    void add() {
        calculator.add(2, 2);
        assertEquals(4, calculator.getResult());
    }

    @Test
    void subtract() {
        calculator.subtract(4, 2);
        assertEquals(2, calculator.getResult());
    }

    @Test
    void multiply() {
        assertEquals(10, calculator.multiply(5, 2));
    }

    @Test
    void divide() {
        assertEquals(10, calculator.divide(20, 2));
        // fail("Not yet implemented");
    }

    @Test
    void getResult() {
        assertEquals(0, calculator.result);
    }

    @Test
    void failingTest() {
        // fail("a failing test");
    }

    @Test()
    @Disabled("for demonstration purposes")
    public void testDivideByZero() {
        // calculator.divide(4,0);
    }

    @Test
    void abortedTest() {
        assumeTrue("abc".contains("Z"));
        fail("test should have been aborted");
    }

    @AfterEach
    public void tearDown() throws Exception {
        System.out.println("测试结束");
    }
}
