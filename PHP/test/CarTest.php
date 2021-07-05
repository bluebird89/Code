<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use syntax\oop\AddOil;
use syntax\oop\BaseCar;
use syntax\oop\Car1;

class CarTest extends TestCase
{
    public function testDrive(BaseCar $car)
    {
//        $car->drive();
    }

    public function testAddOil(AddOil $addOil)
    {
        $addOil->add();
    }

    public function testCar1Drive(Car1 $car)
    {
        $car->drive();
    }
}


//$lynkco = new \Oop\LynkCo();
//$testCar = new CarTest();
//
//$testCar->testDrive($lynkco);
//$testCar->testAddOil($lynkco);

//echo "============================".PHP_EOL;
//$battery = new \Oop\Battery();
//$lynk01 = new \Oop\LynkCo01($battery);
//$lynk01->drive();
//echo "电力不足，自动切换为使用汽油作为动力来源...".PHP_EOL;
//$gas = new \Oop\Gas();
//$lynkCo01 = new \Oop\LynkCo01($gas);
//$testCar->testDrive($lynkCo01);
