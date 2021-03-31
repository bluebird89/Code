<?php
# 值传递
$a = 1;
$b = 2;
function add(int $a, int $b): int
{
    $a += $b;
    return $a;
}

$c = add($a, $b);
printf("\$a = %d\n", $a);
printf("\$c = %d\n", $c);

# 引用传递
function add_v(int &$a, int $b)
{
    $a += $b;
}

add_v($a, $b);
printf("\$a = %d\n", $a);

# 作用域
$d = 10;
function myFunction($d)
{
    echo $d.PHP_EOL;
    ++$d;
    echo $d.PHP_EOL;
}

myFunction($d++); # 传入10, 函数内改变对外无影响
echo $d.PHP_EOL;

$f = 7;
function myFunction1(&$d)
{
    return $d++;
}

echo myFunction1($f).PHP_EOL;
echo $f.PHP_EOL;

#### 匿名(闭包)函数Closure
$add = function (int $a, int $b) {
    return $a + $b;
};
echo "$a + $b = ".$add($a, $b).PHP_EOL;

# 动态设置函数类型值
function multi(int $a, int $b): int
{
    return $a * $b;
}

$add = 'multi';
echo "$a x $b = ".$add($a, $b).PHP_EOL;

# 支持在函数体中直接引用上下文变量(继承父作用域的变量)
# 通过 use 关键字传递当前上下文中的变量，就可以在闭包函数体中直接使用，而不需要通过参数形式传入
# 其他引用该文件的代码就可以间接引用当前父作用域下的变量，如果是在类方法中定义的匿名函数，则可以直接引用相应类实例的属性
# 函数　默认不能引用全局变量
$a = 5;
$b = 6;
//function multiV()
//{
//    return $a * $b;
//}

//echo multiV().PHP_EOL;

# 基于 global 关键字通过全局变量引用函数体外部定义的变量
$n1 = 100;
$n2 = 54;
function sub()
{
    global $n1, $n2;
    return $n1 - $n2;
}

echo sub().PHP_EOL;

# global vs. 匿名函数:作用域不一样
# 全局变量存在于一个全局的范围
# 而闭包的父作用域是定义该闭包的函数，不一定是调用它的函数
function add1($n1, $n2)
{
    return function () use ($n1, $n2) {
        return $n1 + $n2;
    };
}

function add2()
{
    return function () {
        global $n1, $n2, $n3;
        return $n1 + $n2 + $n3;
    };
}

$n1 = 1;
$n2 = 3;
$n3 = 4;
$add = add1($n1, $n2);
$sum = $add();
echo "$n1 + $n2 = $sum".PHP_EOL;

$add = add2();
$sum = $add();
echo "$n1 + $n2 + $n3 = $sum".PHP_EOL;

# 可变数量的参数列表
function sum(...$numbers)
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    printf("The num of the arguments are %d\n", func_num_args());
    printf("The sum of these numbers are %d\n", $sum);
}

sum(1, 2, 3, 4, 5);

function sayHello($name, $age = 28)
{
    echo "Hello $name, you are $age years old<br/>";
}

sayHello("Maxsu", 27);
sayHello("Henry");

function add_some_extra(&$string)
{
    $string .= 'and something extra.';
    echo $string;
}

$str = 'This is a string, ';
add_some_extra($str); # This is a string, and something extra.

function makecoffee($types = array("cappuccino"), $coffeeMaker = null)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}

echo makecoffee();
echo makecoffee(array("cappuccino", "lavazza"), "teapot");

function increment($i)
{
    echo $i++;
}

$i = 10;
increment($i); # 10

function increment1(&$i)
{
    echo $i++;
}

$i = 10;
increment1($i);
echo $i; # 10 11

function sum1(...$numbers)
{
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum1(1, 2, 3, 4);

function small_numbers()
{
    return array(0, 1, 2);
}

list($zero, $one, $two) = small_numbers();

function add3(...$numbers)
{
    $sum = 0;
    foreach ($numbers as $n) {
        $sum += $n;
    }
    return $sum;
}

echo add3(1, 2, 3, 4);

function display($number)
{
    if ($number <= 5) {
        echo "$number <br/>";
        display($number + 1);
    }
}

display(1);

function factorial($n)
{
    if ($n < 0) {
        return -1;
    } /*Wrong value*/
    if ($n == 0) {
        return 1;
    } /*Terminating condition*/
    return ($n * factorial($n - 1));
}

echo factorial(5);

function foo()
{
    echo "In foo()<br />\n";
}

function bar($arg = '')
{
    echo "In bar(); argument was '$arg'.<br />\n";
}

// 使用 echo 的包装函数
function echoit($string)
{
    echo $string;
}

$func = 'foo';
$func();        // This calls foo()

$func = 'bar';
$func('test');  // This calls bar()

$func = 'echoit';
$func('test');  // This calls echoit()

echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');// 输出 helloWorld
$greet = function ($name) {
    printf("Hello %s\r\n", $name);
};

$greet('World');
$greet('PHP');

$message = 'hello';
$example = function () use ($message) {
    echo $message;
};
echo $example();

function getClosure($n)
{
    $a = 100;
    return function ($m) use ($n, &$a) {
        $a += $n + $m;
        echo $a."\n";
    };
}

$fn = getClosure(1);
$fn(1);//102
$fn(2);//105
$fn(3);//109
echo $a;//Notice: Undefined variable

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

$dog = new Dog("Rover", "red");
$dog->greet("Hello")();
$dog->swim()();
$dog();
//通过ReflectionClass、ReflectionMethod来动态创建闭包，并实现直接调用非公开方法。
$class = new ReflectionClass('Dog');
$closure = $class->getMethod('privateMethod')->getClosure($dog);
$closure();

$username = $_GET['user'] ?? 'nobody';

$bytes = random_bytes(5);
echo bin2hex($bytes).PHP_EOL;//string(10) "385e33f741"
echo random_int(100, 999);//int(248)


## 作用域
$x = 5;
$y = 10;
function myTest()
{
    global $x, $y;
    $y = $x + $y;
    echo $y;
}

myTest(); // 15

function myTest1()
{
    static $x = 0;
    echo $x;
    $x++;
}

myTest1(); // 0
myTest1(); // 1
myTest1(); // 2

function myTest2($x)
{
    echo $x;
}

myTest2(5); # 5

// 函数内销毁全局变量$foo无效,应使用 $GLOBALS 数组来实现
function destroy_foo()
{
    global $foo;
    // unset($foo);
    unset($GLOBALS['bar']);
    echo $foo;//Notice: Undefined variable: foo
}

$foo = 'bar';
destroy_foo();
echo $foo;

function foo1()
{
    $args = func_get_args();
    foreach ($args as $k => $v) {
        echo "arg".($k + 1).": $v";
    }
}

foo1();
foo1('hello');
foo1('hello', 'world', 'again');
