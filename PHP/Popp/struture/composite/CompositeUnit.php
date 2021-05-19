<?php


namespace Popp\struture\composite;


abstract class CompositeUnit extends Unit
{
    private $units = [];

    public function getComposite()
    {
        return $this;
    }

    protected function units()
    {
        return $this->units;
    }

    public function removeUnit(Unit $unit)
    {
        $this->units = array_udiff($this->units, [$unit], function ($a, $b) {
            return ($a == $b) ? 0 : 1;
        });
    }

    public function addUnit(Unit $unit)
    {
        if (!in_array($unit, $this->units)) {
            $this->units[] = $unit;
            $this->setDepth($this->getDepth() + 1);
        }
    }

    public function bombardStrength()
    {
        $ret = 0;
        foreach ($this->units as $unit) {
            $ret += $unit->bombardStrength();
        }

        return $ret;
    }

    public function accept(ArmyVisitor $visitor)
    {
        parent::accept($visitor);
        foreach ($this->units() as $unit) {
            $unit->accept($visitor);
        }
    }
}
