<?php

namespace syntax\oop\Satic;

class B extends A
{
    public static function who()
    {
        echo __CLASS__;
    }

    public static function foo()
    {
        A::test();
        parent::test();
        self::test();
    }
}
