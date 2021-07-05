<?php


namespace syntax\oop;

class Dog
{
    private $_name;
    protected $_color;

    public function __construct($name, $color)
    {
        $this->_name = $name;
        $this->_color = $color;
    }

    public function greet($greeting)
    {
        return function () use ($greeting) {
            //类中闭包可通过 $this 变量导入对象
            echo "$greeting, I am a {$this->_color} dog named {$this->_name}.\n";
        };
    }

    public function swim()
    {
        return static function () {
            //类中静态闭包不可通过 $this 变量导入对象，由于无需将对象导入闭包中，
            //因此可以节省大量内存，尤其是在拥有许多不需要此功能的闭包时。
            echo "swimming....\n";
        };
    }

    private function privateMethod()
    {
        echo "You have accessed to {$this->_name}'s privateMethod().\n";
    }

    public function __invoke()
    {
        //此方法允许对象本身被调用为闭包
        echo "I am a dog!\n";
    }
}
