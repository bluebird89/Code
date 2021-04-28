package com.example.syntax.oop;

import java.lang.reflect.Field;

/**
 * @author henry
 */
public class UseReflection {
    public static void main(String[] args) {
        Class clazz = Merchandise.class;
//        Field countField = clazz.getField('count');
//        Field countField = clazz.getDeclaredField('count');
//        countField.get(m100);
        for (Field field : clazz.getFields()) {
            System.out.println(field.getType());
        }

//        Method descMethod = clazz.getMethod('describe');
//        descMethod.invoke(m100);
    }
}
