<?php


namespace Popp\struture\composite;

class TroopCarrier extends CompositeUnit
{
    public function bombardStrength()
    {
        return parent::bombardStrength() + 200;
    }
}
