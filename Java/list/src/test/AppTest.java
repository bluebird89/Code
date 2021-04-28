
import org.junit.AfterClass;
import org.junit.BeforeClass;
import org.junit.Test;
import org.junit.jupiter.api.*;

import static org.junit.Assert.*;
import static org.junit.jupiter.api.Assertions.assertEquals;

public class AppTest {
    @Test
    public void testAppHasAGreeting() {
        App classUnderTest = new App();
        assertNotNull("app should have a greeting", classUnderTest.getGreeting());
    }

    @BeforeClass
    public static void setUpBeforeClass() throws Exception {
        System.out.println("This is beforeClass...");
    }

    @AfterClass
    public static void tearDownAfterClass() throws Exception {
        System.out.println("This is afterClass...");
    }

    @BeforeEach
    public void setUp() throws Exception {
        System.out.println("This is Before...");
    }
    @AfterEach
    public void tearDown() throws Exception {
        System.out.println("This is After...");
    }

    @Test
    public void test() {
        System.out.println("Junit is working fine");
    }


    @BeforeEach
    @DisplayName("每条用例开始时执行")
    public void start(){

    }

    @AfterEach
    @DisplayName("每条用例结束时执行")
    public void end(){

    }

    @Test
    public void myFirstTest() {
        assertEquals(2, 1 + 1);
    }

    @Test
    @DisplayName("描述测试用例")
    public void testWithDisplayName() {

    }

    @Test
    @Disabled("这条用例暂时跑不过，忽略!")
    public void myFailTest(){
        assertEquals(2,2);
    }

//    @Test
//    @DisplayName("运行一组断言")
//    public void assertAllCase() {
//        assertAll("groupAssert",
//                () -> assertEquals(2, 1 + 1),
//                () -> assertTrue(1 > 0)
//        );
//    }

//    @Test
//    @DisplayName("依赖注入1")
//    public void testInfo(final TestInfo testInfo) {
//        System.out.println(testInfo.getDisplayName());
//    }

//    @Test
//    @DisplayName("依赖注入2")
//    public void testReporter(final TestReporter testReporter) {
//        testReporter.publishEntry("name", "Alex");
//    }
}
