<?php

class MyHelloWorld extends Base
{
    use SayWorld, SayHello;
}

$o = new MyHelloWorld();
$o->sayHi();
$o->sayHello();
$o->SayWorld();
