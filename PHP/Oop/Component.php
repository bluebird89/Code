<?php


namespace Oop;

trait Component
{
    use PowerTrait, Engine {
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