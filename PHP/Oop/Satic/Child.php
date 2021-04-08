<?php

namespace Oop;

class Child extends BaseChild
{
    public function __construct()
    {
        echo "Child constructor!", PHP_EOL;
    }

    public function selfFoo()
    {
        return self::foo();
    }

    public function foo()
    {
        echo "Child Foo!", PHP_EOL;
    }
}

$base = Child::getSelf();
$child = Child::getInstance();

$child->selfFoo();
$child->staticFoo();
$child->thisFoo();
