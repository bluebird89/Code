<?php

require './../../../vendor/autoload.php';

function joinExisting(\Popp\behavior\composite\Unit $newNuit, \Popp\behavior\composite\Unit $occpuyingUnit)
{

    if (!is_null($comp = $occpuyingUnit->getComposite())) {
        $comp->addUnit($newNuit);
    } else {
        $comp = new \Popp\behavior\composite\Army();
        $comp->addUnit($newNuit);
        $comp->addUnit($occpuyingUnit);
    }
    return $comp;
}

$new = new \Popp\behavior\composite\TroopCarrier();
$new->addUnit(new \Popp\behavior\composite\Archer());
$new->addUnit(new \Popp\behavior\composite\LaserCanon());

$comp = joinExisting(new \Popp\behavior\composite\Archer(), $new);
echo $comp->bombardStrength().PHP_EOL;

$res = new \Popp\behavior\composite\Army();
$res->addUnit($comp);
echo $res->bombardStrength();
