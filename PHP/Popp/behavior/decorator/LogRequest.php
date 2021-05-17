<?php


namespace Popp\behavior\decorator;


class LogRequest extends DecorateProcess
{
    function process(RequestHelper $req)
    {
        print __CLASS__.":Logging request\n";
        $this->processrequest->process($req);
    }
}
