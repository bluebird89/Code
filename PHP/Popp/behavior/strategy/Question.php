<?php


namespace Popp\behavior\strategy;

abstract class Question
{
    protected $prompt;
    protected $maker;

    public function __construct($prompt, $maker)
    {
        $this->maker = $maker;
        $this->prompt = $prompt;
    }

    public function mark($response)
    {
        return $this->maker->mark($response);
    }
}
