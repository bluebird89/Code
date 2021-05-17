<?php


namespace Popp\behavior\decorator;


abstract class ProcessRequest
{
    abstract function process(RequestHelper $req);
}
