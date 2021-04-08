<?php

namespace Oop;

class Car2
{
    use Component;

    public function drive()
    {
        // 初始化系统
        $this->init();
        $this->printPower();
        $this->printEngine();
        echo "汽车启动...".PHP_EOL;
    }
}