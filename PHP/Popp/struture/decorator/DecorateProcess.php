<?php


namespace Popp\behavior\decorator;

abstract class DecorateProcess extends ProcessRequest
{
    protected ProcessRequest $processrequest;

    public function __construct(ProcessRequest $pr)
    {
        $this->processrequest = $pr;
    }
}
