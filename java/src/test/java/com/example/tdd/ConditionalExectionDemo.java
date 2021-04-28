// package tdd;
//
// import org.junit.jupiter.api.Disabled;
// import org.junit.jupiter.api.Test;
// import org.junit.jupiter.api.condition.DisabledOnOs;
// import org.junit.jupiter.api.condition.EnabledOnOs;
//
// import java.lang.annotation.Retention;
// import java.lang.annotation.Target;
//
// @Disabled("depend env variable")
// public class ConditionalExectionDemo {
//     @Test
//     @EnabledOnOs(MAC)
//     void onlyOnMacOs() {
// // ...
//     }
//
//     @TestOnMac
//     void testOnMac() {
// // ...
//     }
//
//     @Test
//     @EnabledOnOs({LINUX, MAC})
//     void onLinuxOrMac() {
// // ...
//     }
//
//     @Test
//     @DisabledOnOs(WINDOWS)
//     void notOnWindows() {
// // ...
//     }
//
//     @Target(ElementType.METHOD)
//     @Retention(RetentionPolicy.RUNTIME)
//     @Test
//     @EnabledOnOs(MAC)
//     @interface TestOnMac {
//     }
//
//     @Test
//     @EnabledOnOs(MAC)
//     void onlyOnMacOs() {
// // ...
//     }
//
//
//     @Test
//     @EnabledOnOs({LINUX, MAC})
//     void onLinuxOrMac() {
// // ...
//     }
//
//     @Test
//     @DisabledOnOs(WINDOWS)
//     void notOnWindows() {
// // ...
//     }
//
//     @Target(ElementType.METHOD)
//     @Retention(RetentionPolicy.RUNTIME)
//     @Test
//     @EnabledOnOs(MAC)
//     @interface TestOnMac {
//     }
//
//     @Test
//     @EnabledForJreRange(min = JAVA_9, max = JAVA_11)
//     void fromJava9to11() {
// // ...
//     }
//
//     @Test
//     @EnabledForJreRange(min = JAVA_9)
//     void fromJava9toCurrentJavaFeatureNumber() {
// // ...
//     }
//
//     @Test
//     @EnabledForJreRange(max = JAVA_11)
//     void fromJava8To11() {
// // ...
//     }
//
//     @Test
//     @DisabledOnJre(JAVA_9)
//     void notOnJava9() {
// // ...
//     }
//
//     @Test
//     @DisabledForJreRange(min = JAVA_9, max = JAVA_11)
//     void notFromJava9to11() {
// // ...
//     }
//
//     @Test
//     @DisabledForJreRange(min = JAVA_9)
//     void notFromJava9toCurrentJavaFeatureNumber() {
// // ...
//     }
//
//     @Test
//     @DisabledForJreRange(max = JAVA_11)
//     void notFromJava8to11() {
// // ...
//     }
//     @Test
//     @EnabledIfSystemProperty(named = "os.arch", matches = ".*64.*")
//     void onlyOn64BitArchitectures() {
// // ...
//     }
//
//     @Test
//     @DisabledIfSystemProperty(named = "ci-server", matches = "true")
//     void notOnCiServer() {
// // ...
//     }
//     @Test
//     @EnabledIfEnvironmentVariable(named = "ENV", matches = "staging-server")
//     void onlyOnStagingServer() {
// // ...
//     }
//     @Test
//     @DisabledIfEnvironmentVariable(named = "ENV", matches = ".*development.*")
//     void notOnDeveloperWorkstation() {
// // ...
//     }
//
// }
