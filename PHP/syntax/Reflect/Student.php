<?php


namespace syntax\Reflect;

use ReflectionClass;

class Student
{
    private $name;
    private $year;

    public function __construct($name, $year)
    {
        $this->name = $name;
        $this->year = $year;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setBase(Printer $printer, $name, $year = 10)
    {
        $this->name = $name;
        $this->year = $year;
    }
}
