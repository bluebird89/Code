<?php


namespace Popp\behavior\composite;


class Army extends CompositeUnit
{
    public function bombardStrength()
    {
        return parent::bombardStrength() * 1.5;
    }
}
