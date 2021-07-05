<?php

namespace syntax\oop;

## 抽象 继承 多态
use ReflectionMethod;

class Worker extends Person
{
    private $factory = 'Audi manufacture';

    /**
     * Worker constructor.
     */
    public function __construct($age = 18, $gender = 'Male')
    {
        $this->job = 'worker';
        parent::__construct($this->job, $age, $gender);
    }

    public function work(): void
    {
        echo "Call custom prop \$factory: ".$this->factory.PHP_EOL;
        echo "This is a custom method in Worker Class".PHP_EOL;
    }

    # 继承与多态
    public function say()
    {
        echo "I'm a worker \n";
        parent::say();
    }

    private function afterWork()
    {
        echo "Go to Bar \n";
    }
}

$worker = new Worker();
$worker->say();
$worker->work();

$method = new ReflectionMethod(Worker::class, 'afterWork');
$method->setAccessible(true);
$method->invoke($worker);
