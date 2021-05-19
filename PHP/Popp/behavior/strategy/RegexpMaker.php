<?php


namespace Popp\behavior\strategy;

class RegexpMaker extends Maker
{
    public function mark($response)
    {
        return (preg_match($this->test, $response));
    }
}
