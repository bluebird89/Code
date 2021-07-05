<?php


namespace syntax\phpunit;

abstract class AbstractClass
{
    public function concreteMethod()
    {
        return $this->abstractMethod();
    }

    abstract public function abstractMethod();
}
