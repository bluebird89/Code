<?php

namespace oop;

trait PowerTrait
{
    protected $power;

    public function battery()
    {
        $this->power = '电池';
    }

    public function print()
    {
        echo "动力来源：".$this->power.PHP_EOL;
    }

    protected function gas()
    {
        $this->power = '汽油';
    }

    private function water()
    {
        $this->power = '水';
    }
}
