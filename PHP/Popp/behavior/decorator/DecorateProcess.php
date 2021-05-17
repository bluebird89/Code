<?php


namespace Popp\behavior\decorator;


abstract class DecorateProcess extends ProcessRequest
{
    protected $processrequest;

    function __construct(ProcessRequest $pr)
    {
        $this->processrequest = $pr;
    }
}
