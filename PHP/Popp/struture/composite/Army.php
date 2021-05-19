<?php


namespace Popp\struture\composite;

class Army extends CompositeUnit
{
    public function bombardStrength()
    {
        return parent::bombardStrength() * 1.5;
    }
}
