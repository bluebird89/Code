<?php


namespace Popp\behavior\strategy;

class MarkLogicMaker extends Maker
{
    private $engine;

    public function __construct($test)
    {
        parent::__construct($test);
//        $this->engine = new MarkEngine();
    }

    public function mark($response)
    {
//        return $this->engine->evalute($response);
        return true;
    }
}
