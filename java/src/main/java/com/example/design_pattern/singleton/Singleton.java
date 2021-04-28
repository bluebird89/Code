package com.example.design_pattern.singleton;

public class Singleton {
    private static final Singleton singletonNoStrict = new Singleton();

    private Singleton() {
        System.out.println("Create a instance");
        slowdown();
    }

    public static synchronized Singleton getInstance() {
        return singletonNoStrict;
    }

    private void slowdown() {
        try {
            Thread.sleep(1000);
        } catch (InterruptedException ignored) {
        }
    }
}
