<?php


namespace syntax\oop;

use syntax\oop\Trit\PowerTrait;

trait Component
{
    use PowerTrait, Engine {
        EngineTrait::printText insteadof PowerTrait;
        PowerTrait::print as printPower;
        EngineTrait::print as printEngine;
    }

    protected function init()
    {
        $this->gas();
        $this->four();
    }
}
