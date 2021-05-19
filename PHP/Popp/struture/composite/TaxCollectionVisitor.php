<?php


namespace Popp\struture\composite;


class TaxCollectionVisitor extends ArmyVisitor
{
    private $due = 0;
    private $report = '';

    public function visit(Unit $node)
    {
        $this->levy($node, 1);
    }

    public function visitArcher(Archer $node)
    {
        $this->levy($node, 2);
    }

    public function visitCavalry(Cavalry $node)
    {
        $this->levy($node, 3);
    }

    public function visitTroopCarrier(TroopCarrier $node)
    {
        $this->levy($node, 5);
    }

    private function levy(Unit $node, int $mount)
    {
        $this->report .= "Tax levied for ".basename(str_replace('\\', '/', get_class($node)));
        $this->report .= ": $mount".PHP_EOL;
        $this->due += $mount;
    }

    public function getReport()
    {
        return $this->report;
    }

    public function getTax()
    {
        return $this->due;
    }
}
