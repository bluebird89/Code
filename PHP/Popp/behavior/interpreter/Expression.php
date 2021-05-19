<?php


namespace Popp\behavior\interpreter;

abstract class Expression
{
    private static int $keycount = 0;
    private $key;

    abstract public function interpreter(InterpeterContext $context);

    public function getKey()
    {
        if (!isset($this->key)) {
            self::$keycount++;
            $this->key = self::$keycount;
        }
        return $this->key;
    }
}
