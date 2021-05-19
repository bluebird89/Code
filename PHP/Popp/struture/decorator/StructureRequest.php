<?php


namespace Popp\behavior\decorator;

class StructureRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        print __CLASS__.":structuring  request data \n";
        $this->processrequest->process($req);
    }
}
