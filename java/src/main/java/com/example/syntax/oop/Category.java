package com.example.syntax.oop;

public enum Category {
    FOOD(1),
    COOK(3),
    SNACK(4),
    ELECTIC(5);

    private final int id;

    Category(int id) {
        this.id = id;
    }
}
