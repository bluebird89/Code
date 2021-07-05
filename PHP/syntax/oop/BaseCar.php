<?php


namespace syntax\oop;

abstract class BaseCar implements CarContract
{
    protected $brand;
    protected $power;

    public function __construct(iPower $power, $brand)
    {
        $this->power = $power;
        $this->brand = $brand;
    }

    abstract public function drive();
}
