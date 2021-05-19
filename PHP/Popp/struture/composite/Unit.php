<?php


namespace Popp\struture\composite;

abstract class Unit
{
    private int $depth = 0;

    public function getComposite()
    {
        return null;
    }

    abstract public function bombardStrength();

    // Visitor
    public function accept(ArmyVisitor $visitor)
    {
        $method = "visit".basename(str_replace('\\', '/', get_class($this)));
        $visitor->$method($this);
    }

    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    public function getDepth()
    {
        return $this->depth;
    }
}
