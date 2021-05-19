<?php


namespace Popp\behavior\composite;


abstract class Unit
{
    public function getComposite()
    {
        return null;
    }

    abstract function bombardStrength();
}
