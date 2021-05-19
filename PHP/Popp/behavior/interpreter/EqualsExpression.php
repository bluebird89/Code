<?php


namespace Popp\behavior\interpreter;


class EqualsExpression extends OperatorExpression
{

    protected function doInterpreter(InterpeterContext $context, $result_l, $result_r)
    {
        $context->replace($this, $result_r == $result_l);
    }
}
