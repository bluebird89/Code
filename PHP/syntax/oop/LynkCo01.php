<?php

namespace oop;

class LynkCo01 extends BaseCar
{
    public function __construct(Power $power)
    {
        $this->brand = '领克01';
        parent::__construct($power, $this->brand);
    }

    public function drive()
    {
        echo "启动{$this->brand}汽车".PHP_EOL;
        echo "动力来源: ".$this->power->power().PHP_EOL;
    }
}
