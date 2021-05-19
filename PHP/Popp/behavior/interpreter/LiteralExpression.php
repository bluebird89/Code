<?php


namespace Popp\behavior\interpreter;

class LiteralExpression extends Expression
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function interpreter(InterpeterContext $context)
    {
        $context->replace($this, $this->value);
    }
}
