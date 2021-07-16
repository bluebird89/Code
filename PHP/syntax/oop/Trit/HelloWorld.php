<?php


namespace syntax\oop\Trit;

trait HelloWorld
{
    use Hello, SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
