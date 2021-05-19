<?php


namespace Popp\behavior\structure;


class Army extends CompositeUnit
{
    public function bombardStrength()
    {
        return parent::bombardStrength() * 1.5;
    }
}
