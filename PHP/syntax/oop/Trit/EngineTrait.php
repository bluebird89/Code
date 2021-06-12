<?php

namespace oop;

trait EngineTrait
{
    protected $engine;

    public static function print(): void
    {
        echo "发动机个数：" . $this->engine . PHP_EOL;
    }

    protected function three(): void
    {
        $this->engine = 3;
    }

    protected function four(): void
    {
        $this->engine = 4;
    }
}
