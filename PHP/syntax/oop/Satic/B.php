<?php

namespace oop\Trit\Satic;

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
