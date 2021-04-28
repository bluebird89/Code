package com.example.syntax.oop;

public class Apple extends Fruit {
    int num;
    String color;

    public Apple() {
        this.num = 10;
        this.color = "Red";
    }

    public Apple(int num) {
        this(num, "红色");
    }

    public Apple(String color) {
        this(10, color);
    }

    public Apple(int num, String color) {
        this.color = color;
        this.num = num;
    }

    public int getApple(int num) {
        return 1;
    }

    public String getApple(String color) {
        return "color";
    }

    @Override
    public void eat() {
        super.num--;
        System.out.println("Leaved " + num + " Apple");
    }
}
