<?php

require './../../../vendor/autoload.php';

function joinExisting(\Popp\struture\composite\Unit $newNuit, \Popp\struture\composite\Unit $occpuyingUnit)
{
    if (!is_null($comp = $occpuyingUnit->getComposite())) {
        $comp->addUnit($newNuit);
    } else {
        $comp = new \Popp\struture\composite\Army();
        $comp->addUnit($newNuit);
        $comp->addUnit($occpuyingUnit);
    }

    return $comp;
}

$new = new \Popp\struture\composite\TroopCarrier();
$new->addUnit(new \Popp\struture\composite\Archer());
$new->addUnit(new \Popp\struture\composite\LaserCanon());

$comp = joinExisting(new \Popp\struture\composite\Cavalry(), $new);
echo $comp->bombardStrength().PHP_EOL;

$res = new \Popp\struture\composite\Army();
$res->addUnit($comp);
echo $res->bombardStrength().PHP_EOL;

$new->addUnit(new \Popp\struture\composite\Cavalry());

$textdump = new \Popp\struture\composite\TextDumpArmyVisitor();
$new->accept($textdump);
print $textdump->getText().PHP_EOL;

$taxCollection = new \Popp\struture\composite\TaxCollectionVisitor();
$new->accept($taxCollection);
print $taxCollection->getReport();
print 'TOTAL:'.$taxCollection->getTax().PHP_EOL;
