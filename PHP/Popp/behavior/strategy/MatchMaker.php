<?php


namespace Popp\behavior\strategy;

class MatchMaker extends Maker
{
    public function mark($response)
    {
        return ($response == $this->test);
    }
}
