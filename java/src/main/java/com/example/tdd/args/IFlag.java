package com.example.tdd.args;

public interface IFlag {
    String getType();

    Object getDefaultValue();

    Object getValue();

    Boolean isTypeOf(String type);
}
