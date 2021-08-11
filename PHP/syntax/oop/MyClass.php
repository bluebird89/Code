<?php


namespace syntax\oop;


class MyClass
{
}

$a = new MyClass;

var_dump(!($a instanceof stdClass)); # true
