<?php


namespace Popp\behavior\interpreter;


class BooleanOrExpression extends OperatorExpression
{

    protected function doInterpreter(InterpeterContext $context, $result_l, $result_r)
    {
        $context->replace($this, $result_l || $result_r);
    }
}
