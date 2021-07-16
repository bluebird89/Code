<?php

namespace syntax\closure;

require '../../vendor/autoload.php';

# 函数调用另一种方式
function barber($type)
{
    echo "You wanted a $type haircut, no problem" . PHP_EOL;
}

call_user_func('barber', "mushroom");
call_user_func('barber', "shave");

# class
call_user_func(array('MyClass', 'myCallbackMethod'));
call_user_func('MyClass::myCallbackMethod');

$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

class A
{
    public static function who()
    {
        echo "A" . PHP_EOL;
    }
}

class B extends A
{
    public static function who()
    {
        echo "B" . PHP_EOL;
    }
}

call_user_func(['B', 'self::who']);
call_user_func(['B', 'static::who']);
call_user_func(function ($arg) {
    print "[$arg]\n";
}, 'test');

class c
{
    public function __invoke($name)
    {
        echo 'Hello ', $name, PHP_EOL;
    }
}

$c = new c();
call_user_func($c, "PHP!");

# closure
$double = function ($a) {
    return $a * 2;
};
$numbers = range(1, 5);
$new_numbers = array_map($double, $numbers);
print implode(' ', $new_numbers) . PHP_EOL;

function foobar($arg, $arg2)
{
    echo __FUNCTION__, " got $arg and $arg2" . PHP_EOL;
}

class foo
{
    public function bar($arg, $arg2)
    {
        echo __METHOD__, " got $arg and $arg2" . PHP_EOL;
    }
}

call_user_func("foobar", "one", "two");

$foo = new foo;
call_user_func(array($foo, "bar"), "three", "four");

class Foo2
{
    public static function test($name)
    {
        print "Hello {$name}!" . PHP_EOL;
    }
}

call_user_func_array(__NAMESPACE__ . 'Foo2::test', array('Hannes'));
call_user_func_array(array(__NAMESPACE__ . 'Foo2', 'test'), array('Philip'));
