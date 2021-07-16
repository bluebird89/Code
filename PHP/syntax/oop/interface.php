<?php

# Traversable  遍历
$myarray = array('one', 'two', 'three');
$myobj = (object) $myarray;

if (!($myarray instanceof Traversable)) {
    print "myarray is NOT Traversable" . PHP_EOL;
}
if (!($myobj instanceof Traversable)) {
    print "myobj is NOT Traversable" . PHP_EOL;
}

foreach ($myarray as $value) {
    print $value;
}
echo PHP_EOL;
foreach ($myobj as $value) {
    print $value;
}
echo PHP_EOL;

## Iterator 迭代器
class myIterator implements Iterator
{
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind()
    {
        echo __METHOD__.'-';
        $this->position = 0;
    }

    public function current()
    {
        echo __METHOD__.'-';
        return $this->array[$this->position];
    }

    public function key()
    {
        echo __METHOD__.'-';
        return $this->position;
    }

    public function next()
    {
        echo __METHOD__;
        ++$this->position;
    }

    public function valid()
    {
        echo __METHOD__.'-';
        return isset($this->array[$this->position]);
    }
}

$it = new ownIterator;

foreach ($it as $key => $value) {
    echo $key.':'.$value.PHP_EOL;
}

## IteratorAggregate 聚合式迭代器
class myData implements IteratorAggregate
{
    public $property1 = "Public property one";
    public $property2 = "Public property two";
    public $property3 = "Public property three";

    public function __construct()
    {
        $this->property4 = "last property";
    }

    public function getIterator()
    {
        return new ArrayIterator($this);
    }
}

$obj = new myData;

foreach ($obj as $key => $value) {
    echo $key.':'.$value.PHP_EOL;
}

## arrayAccess
class obj implements arrayaccess
{
    private $container = array();

    public function __construct()
    {
        $this->container = array(
            "one" => 1,
            "two" => 2,
            "three" => 3,
        );
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

$obj = new obj;

var_dump(isset($obj["two"]));
var_dump($obj["two"]);
unset($obj["two"]);
var_dump(isset($obj["two"]));
$obj["two"] = "A value";
var_dump($obj["two"]);
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);

## serialize
class objC implements Serializable
{
    private $data;

    public function __construct()
    {
        $this->data = "My private data";
    }

    public function serialize()
    {
        return serialize($this->data);
    }

    public function unserialize($data)
    {
        $this->data = unserialize($data);
    }

    public function getData()
    {
        return $this->data;
    }
}

$obj = new objC;
$ser = serialize($obj);
$newobj = unserialize($ser);

var_dump($newobj->getData());

## Closure:用于代表 匿名函数 的类
#  __invoke 方法
//Closure::bind — 复制一个闭包，绑定指定的$this对象和类作用域。
//Closure::bindTo — 复制当前闭包对象，绑定指定的$this对象和类作用域
class CRequest
{
    public array $routes = [];
    protected string $responseStatus = '200 OK';
    protected string $responseContentType = 'text/html';
    protected string $responseBody = 'Laravel学院';

    public function addRoute($routePath, $routeCallback): void
    {
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function dispatch($currentPath): void
    {
        foreach ($this->routes as $routePath => $callback) {
            if ($routePath === $currentPath) {
                $callback();
            }
        }
        header('HTTP/1.1 '.$this->responseStatus);
        header('Content-Type: '.$this->responseContentType);
        header('Content-Length: '.mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}

$app = new CRequest();
$app->addRoute('user/nonfu', function () {
    $this->responseContentType = "application/json;charset=utf8";
    $this->responseBody = '{“name”:”LaravelAcademy"}';
});

$app->dispatch('user/nonfu');

# 匿名函数
$greet = function ($name) {
    return sprintf("Hello %s\r\n", $name);
};
echo $greet('LaravelAcademy.org');

# 回调
$numberPlusOne = array_map(function ($number) {
    return $number + 1;
}, [1, 2, 3]);
