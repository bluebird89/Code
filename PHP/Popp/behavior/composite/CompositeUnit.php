<?php


namespace Popp\behavior\composite;


abstract class CompositeUnit extends Unit
{
    private $units = [];

    function getComposite()
    {
        return $this;
    }

    protected function units()
    {
        return $this->units;
    }

    function removeUnit(Unit $unit)
    {
        $this->units = array_udiff($this->units, [$unit], function ($a, $b) {
            return ($a == $b) ? 0 : 1;
        });
    }

    function addUnit(Unit $unit)
    {
        if (!in_array($unit, $this->units)) {
            $this->units[] = $unit;
        }
        return;
    }

    function bombardStrength()
    {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }

        return $ret;
    }
}
