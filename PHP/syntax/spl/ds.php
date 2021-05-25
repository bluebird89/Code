<?php

use Ds\Set;
use Ds\Vector;

$a = new Vector([1, 2, 3]);
$b = $a->copy();

$b->push(4);

print_r($a);
print_r($b);

$vector = new Vector(["a", "b", "c"]);
echo $vector->get(1)."\n";
$vector[1] = "d";
echo $vector->get(1)."\n";
$vector->push('f');
echo "Size of vector: ".$vector->count()."\n";


$set = new Set();
$set->add(1);
$set->add(1);
$set->add("test");
$set->add(3);
echo $set->get(1);
