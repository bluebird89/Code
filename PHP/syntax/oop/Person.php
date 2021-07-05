<?php

namespace syntax\oop;

// Object Oriented Programming
// 核心的概念就是类（Class）和对象（Object），类是对象的抽象模板，而对象是类的具体实例
// $this 变量，指向的是当前对象实例引用，可以用于在类内部调用对象级别属性和方法
// 类级别用 self:: 访问
class Person
{
    // 类属性
    const NATIONNATITLTY = 'CHINA';

    public $name;
    public $gender;
    private $age;

    /**
     * Person constructor.
     *
     * @param $job
     * @param $age
     * @param $sex
     */
    public function __construct($job, $age = 18, $sex = 'Male')
    {
        $this->job = $job;
        $this->age = $age;
        $this->sex = $sex;
    }


    /**
     * @return integer
     */
    public function getAge(): int
    {
        return $this->age;
    }


    /**
     * @param  integer  $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }


    public function say()
    {
        echo 'Job：'.$this->job.',Sex：'.$this->sex.',Age：'.$this->age.";\n";
    }


    public function __call($funName, $arguments)
    {
        echo 'The function you called：'.$funName.'(parameter：';
        print_r($arguments);
        echo ")does not exist!\n";
    }


    public function __destruct()
    {
        echo 'Well, my job is '.$this->job."\n";
    }
}

if (class_exists('Person')) {
    echo 'class Person exists.'.PHP_EOL;
    printf('%s%s', Person::NATIONNATITLTY, PHP_EOL);

    $person = new Person('John');
    $person->setAge(22);
    $person->say();

    $person->run('teacher');
    $person->eat('John', 'apple');
    unset($person);
} else {
    echo 'class Person not exists.'.PHP_EOL;
}

$obj = (object) ['1' => 'foo'];
var_dump(isset($obj->{'1'}));
var_dump(key($obj));
