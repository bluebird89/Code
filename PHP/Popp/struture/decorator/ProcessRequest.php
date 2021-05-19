<?php


namespace Popp\behavior\decorator;

abstract class ProcessRequest
{
    abstract public function process(RequestHelper $req);
}
