<?php

namespace syntax\oop;

//class CallableClass
//{
//    function __invoke($x) {
//        var_dump($x);
//    }
//}
//$obj = new CallableClass;
//$obj(5);
//var_dump(is_callable($obj));
//
//function __call($function, $args){
//    array_unshift($args, $this->value);
//    $this->value = call_user_func_array($function, $args);
//    return $this;
//}
//
//function __call($function, $args){
//    $this->value = call_user_func($function, $this->value, $args[0]);
//    return $this;
//}


use stdClass;

class Magic
{
    public $brand;
    private $no;
    public $engine = 'Moto';
    protected $data = [];

    public static $WHEELS = 4;

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    public function getNo()
    {
        return $this->no;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->brand = $brand;
    }

    public function __sleep()
    {
        return ['brand', 'no', 'engine'];
    }

    public function __wakeup()
    {
        $this->no = 10001;
    }

    public function __call($name, $arguments)
    {
        echo "调用的成员方法不存在" . PHP_EOL;
    }

    public static function __callStatic($name, $arguments)
    {
        echo "调用的静态方法不存在" . PHP_EOL;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __invoke($brand)
    {
        $this->brand = $brand;
        echo "蓝天白云，定会如期而至 -- " . $this->brand . PHP_EOL;
    }
}

$car = new Magic();
$car->setBrand("领克01");

## __set __get
$car->engine = 'Audi';
echo "发动机品牌：" . $car->engine . PHP_EOL;
$car->name = "林肯";
echo "汽车名字：" . $car->name . PHP_EOL;

## 序列化
$string = serialize($car);
file_put_contents("./../logs/car", $string);
$context = file_get_contents("./../logs/car");
$object = unserialize($context);
echo "汽车品牌：" . $object->getBrand() . PHP_EOL;
echo "汽车No.：" . $object->getNo() . PHP_EOL;

## __call
$object->drive();
Magic::drive();

$object->name = "林肯";
echo "汽车名字：" . $object->name . PHP_EOL;

$car('BWM');

## cpoy
$carA = new stdClass();
$carA->brand = '奔驰';

//$carB = $carA;
$carB = clone $carA;
$carB->brand = '宝马';

var_dump($carA);
var_dump($carB);

$rover = new Magic();

# Getter/Setter方式 vs 存取变量方式:前者比后者打一个数量级
$t = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    $rover->setBrand("rover");
    $rover->getBrand();
}
echo microtime(true) - $t . PHP_EOL;

//直接
$t = microtime(true);
for ($i = 0; $i < 1000000; $i++) {
    $rover->brand = "rover";
    $rover->brand;
}
echo microtime(true) - $t . PHP_EOL;

$startMemory = memory_get_usage();
range(1, 100000);
echo memory_get_usage() - $startMemory, ' bytes';


# __clone实现真正深拷贝
class Test
{
    public int $a = 1;
}

class TestOne
{
    public $b = 1;
    public $obj;

    //包含了一个对象属性，clone时，它会是浅拷贝
    public function __construct()
    {
        $this->obj = new Test();
    }

    //  方法一 重写clone函数
    public function __clone()
    {
        $this->obj = clone $this->obj;
    }
}

$m = new TestOne();

//方法二，序列化反序列化实现对象深拷贝
$n = serialize($m);
$n = unserialize($n);

$n->b = 2;
echo $m->b;//输出原来的1
echo PHP_EOL;
//普通属性实现了深拷贝，改变普通属性b，不会对源对象有影响
$n->obj->a = 3;
echo $m->obj->a;//输出1，不随新对象改变，还是保持了原来的属性,可以看到，序列化和反序列化可以实现对象的深拷贝
