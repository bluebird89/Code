<?php

require './../../../vendor/autoload.php';

use Popp\creational\prototype\EarthSea;
use Popp\creational\prototype\MarsForest;
use Popp\creational\prototype\MarsPlains;

$factory = new \Popp\creational\prototype\TerrainFactory(
    new EarthSea(),
    new MarsForest(),
    new MarsPlains()
);

print_r($factory->getSea());
