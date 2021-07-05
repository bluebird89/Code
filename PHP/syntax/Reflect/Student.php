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

$refl_class = new ReflectionClass(Student::class);
$object = $refl_class->newInstanceArgs(["obama", 100]);
echo get_class($object) . "\n";
echo $object->getName();

$refl_method = $refl_class->getMethod("setBase");
echo get_class($refl_method) . "\n";

$parameters = $refl_method->getParameters();
foreach ($parameters as $parameter) {
    echo $parameter->getName() . "\n";
    if ($parameter->getClass() != null) {
        echo $parameter->getClass()->getName() . "\n";
    }

    if ($parameter->isDefaultValueAvailable()) {
        echo $parameter->getDefaultValue() . "\n";
    }
}
