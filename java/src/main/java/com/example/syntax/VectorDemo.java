package com.example.syntax;

import java.util.Enumeration;
import java.util.Iterator;
import java.util.Vector;

public class VectorDemo {
    public static void main(String[] args) {
        // initial size is 3, increment is 2
        Vector v = new Vector(3, 2);
        System.out.println("Initial size: " + v.size() +", Initial capacity: " + v.capacity());

        v.addElement(1);
        v.addElement(2);
        v.addElement(3);
        v.addElement(4);
        System.out.println("Capacity after four additions: " + v.capacity());

        v.addElement(5.45);
        System.out.println("Current capacity: " +
                v.capacity());
        v.addElement(6.08);
        v.addElement(7);
        System.out.println("Current capacity: " +
                v.capacity());
        v.addElement(9.4f);
        v.addElement(10);
        System.out.println("Current capacity: " +
                v.capacity());
        v.addElement(11);
        v.addElement(12);


        System.out.println("First element: " + (Integer)v.firstElement());
        System.out.println("Last element: " + (Integer)v.lastElement());
        if(v.contains(3)) System.out.println("Vector contains 3.");

        // enumerate the elements in the vector.
        Enumeration vEnum = v.elements();
        System.out.println("\nElements in vector:");
        while(vEnum.hasMoreElements())
            System.out.print(vEnum.nextElement() + " ");
        System.out.println();

        // 1、推荐使用的Iterator对象，迭代输出！
        Iterator it = v.iterator();
        while (it.hasNext()) {
            System.out.println("迭代输出：" + it.next());
        }

        // 2、对集合进行fore循环！
        // for (Integer str : v) {
        //     System.out.println("fore集合迭代输出：" + str);
        // }

        // 3、for循环迭代，在for方法体内部实例化Iterator对象！
        int i = 0;// for方法体内定义项不能出现多种不同类型
        for (Iterator iter = v.iterator(); i < v.size(); i++) {
            System.out.println("for循环迭代实例化输出：" + iter.next());
        }

        // 4、先将集合转换为数组，再利用数组的遍历输出；
        Object[] o = v.toArray();
        for (Object object : o) {
            System.out.println("转换数组迭代输出：" + object);
        }

    }
}
