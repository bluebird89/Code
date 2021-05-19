<?php


namespace Popp\behavior\command;

class CommandContext
{
    private array $params = [];
    private string $error = '';

    public function __construct()
    {
        $this->params = $_REQUEST;
    }

    public function addParam($key, $val)
    {
        $this->params[$key] = $val;
    }

    public function get($key)
    {
        return $this->params[$key];
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}
