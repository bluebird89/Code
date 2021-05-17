<?php


namespace Popp\behavior\decorator;


use DesignPatterns\Creational\Pool\Processor;

class MainProcess extends ProcessRequest
{
    public function process(RequestHelper $req)
    {
        print __CLASS__.": doing something useful with request\n";
    }
}
