<?php


namespace syntax\oop;

use syntax\oop\Trit\EngineTrait;
use syntax\oop\Trit\PowerTrait;

class Component extends Engine
{
    use PowerTrait {
        EngineTrait::print insteadof PowerTrait;
        PowerTrait::print as printPower;
        EngineTrait::print as printEngine;
    }

    protected function init()
    {
        $this->gas();
        $this->four();
    }
}
