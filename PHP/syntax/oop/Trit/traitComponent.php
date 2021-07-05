<?php

namespace syntax\oop;

trait trait1
{
    public function eat()
    {
        echo "This is trait1 eat" . PHP_EOL;
    }

    public function drive()
    {
        echo "This is trait1 drive".PHP_EOL;
    }
}

trait trait2
{
    public function eat()
    {
        echo "This is trait2 eat".PHP_EOL;
    }

    public function drive()
    {
        echo "This is trait2 drive".PHP_EOL;
    }
}

class cat
{
    use trait1, trait2 {
        trait1::eat insteadof trait2;
        trait1::drive insteadof trait2;
    }
}

class dog
{
    use trait1, trait2 {
        trait1::eat insteadof trait2;
        trait1::drive insteadof trait2;
//        trait2::eat as private eaten;
        trait2::eat as eaten;
        trait2::drive as driven;
    }
}

$cat = new cat();
$cat->eat();
$cat->drive();

$dog = new dog();
$dog->eat();

$dog->drive();
$dog->eaten();
$dog->driven();
