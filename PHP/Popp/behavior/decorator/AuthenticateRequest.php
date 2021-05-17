<?php


namespace Popp\behavior\decorator;


class AuthenticateRequest extends DecorateProcess
{
    function process(RequestHelper $req)
    {
        print __CLASS__.":authenticating request\n";
        $this->processrequest->process($req);
    }
}
