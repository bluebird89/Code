<?php

namespace Oop;

class BaseChild
{
    public function __construct()
    {
        echo "Base constructor!", PHP_EOL;
    }

    public static function getSelf()
    {
        return new self();
    }

    public static function getInstance(): BaseChild
    {
        return new static();
    }

    public function selfFoo()
    {
        return $this->foo();
    }

    public function foo()
    {
        echo "Base Foo!", PHP_EOL;
    }

    public function staticFoo()
    {
        return static::foo();
    }

    public function thisFoo()
    {
        return $this->foo();
    }
}
