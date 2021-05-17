<?php


namespace Popp\creational\prototype;

require './../../../vendor/autoload.php';

class TerrainFactory
{
    private $sea;
    private $forest;
    private $plains;

    function __construct(Sea $sea, Forest $forest, Plains $plains)
    {
        $this->forest = $forest;
        $this->sea = $sea;
        $this->plains = $plains;
    }

    function getSea()
    {
        return clone $this->sea;
    }

    function getForest()
    {
        return clone $this->forest;
    }

    function getPlains()
    {
        return clone $this->plains;
    }
}
