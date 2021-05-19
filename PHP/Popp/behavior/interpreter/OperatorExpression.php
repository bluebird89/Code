<?php


namespace Popp\behavior\interpreter;

abstract class OperatorExpression extends Expression
{
    private $l_op;
    private $r_op;

    public function __construct(Expression $l_op, Expression $r_op)
    {
        $this->l_op = $l_op;
        $this->r_op = $r_op;
    }

    public function interpreter(InterpeterContext $context)
    {
        $this->l_op->interpreter($context);
        $this->r_op->interpreter($context);
        $result_l = $context->lookup($this->l_op);
        $result_r = $context->lookup($this->r_op);
        $this->doInterpreter($context, $result_l, $result_r);
    }

    abstract protected function doInterpreter(InterpeterContext $context, $result_l, $result_r);
}
