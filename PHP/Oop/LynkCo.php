<?php

namespace Oop;

# 抽象类与接口实现：
# 抽象类定义具体实现类的共有属性
# 接口进行功能扩展
class LynkCo extends Car implements AddOil
{
    public function __construct()
    {
        $this->brand = '领克03';
        parent::__construct($this->brand);
    }

    public function drive()
    {
        echo "提示：手动档需要踩离合器".PHP_EOL;
        echo "启动{$this->brand}汽车".PHP_EOL;
    }

    public function add()
    {
        echo "Add oil full of tank";
    }
}

