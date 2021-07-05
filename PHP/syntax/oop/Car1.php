<?php

namespace syntax\oop;

use syntax\oop\Trit\EngineTrait;
use syntax\oop\Trit\PowerTrait;

class Car1 extends Engine
{
    // TODO:to fix
    use PowerTrait, EngineTrait {
        Engine::printText insteadof PowerTrait;
        PowerTrait::printText as printPower;
        Engine::printText as printEngine;
    }

    # trait 重写：使用 Trait 的类 > Trait > 父类
    public function drive()
    {
        $this->water();
        $this->printPower();
        $this->battery();
        $this->printPower();
        $this->gas();
        $this->printPower();

        $this->four();
        $this->printEngine();
        echo "汽车启动..." . PHP_EOL;
    }

    protected function gas()
    {
        return "柴油";
    }
}
