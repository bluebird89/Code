<?php

namespace syntax\reflect;

//$refl_class = new \ReflectionClass(Student::class);
//$object = $refl_class->newInstanceArgs(["obama", 100]);
//echo get_class($object) . "\n";
//echo $object->getName();
//
//$refl_method = $refl_class->getMethod("setBase");
//echo get_class($refl_method) . "\n";
//
//$parameters = $refl_method->getParameters();
//foreach ($parameters as $parameter) {
//    echo $parameter->getName() . "\n";
//    if ($parameter->getClass() != null) {
//        echo $parameter->getClass()->getName() . "\n";
//    }
//
//    if ($parameter->isDefaultValueAvailable()) {
//        echo $parameter->getDefaultValue() . "\n";
//    }
//}
use ReflectionFunction;

function display($a, $b, Printer $printer)
{
    echo "called" . "\n";
}

$refl_function = new ReflectionFunction("display");
$parameters = $refl_function->getParameters();
foreach ($parameters as $parameter) {
    echo $parameter->getName() . "\n";
    if ($parameter->getClass() != null) {
        echo $parameter->getClass()->getName() . "\n";
    }
    if ($parameter->isDefaultValueAvailable()) {
        echo $parameter->getDefaultValue() . "\n";
    }
}
