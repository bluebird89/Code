<?php


namespace Popp\behavior\decorator;


class StructureRequest extends DecorateProcess
{
    function process(RequestHelper $req)
    {
        print __CLASS__.":structuring  request data \n";
        $this->processrequest->process($req);
    }
}
