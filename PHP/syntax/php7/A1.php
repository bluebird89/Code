<?php


namespace syntax\php7;

class A1
{
    public function fn1()
    {
        $fn = fn () => var_dump($this);
        $fn(); //  object(A)#1 (0) { }
        $fn = static fn () => var_dump($this);
//        $fn(); //Uncaught Error: Using $this when not in object context
    }
}

$a = new A1();
$a->fn1();
