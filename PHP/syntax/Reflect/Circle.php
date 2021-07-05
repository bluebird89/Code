<?php

namespace syntax\Reflect;

use ReflectionClass;

class Circle
{
    /**
     * @var int
     */
    public $radius;//半径

    /**
     * @var Point
     */
    public $center;//圆心点

    const PI = 3.14;

    public function __construct(Point $point, $radius = 1)
    {
        $this->center = $point;
        $this->radius = $radius;
    }

    //打印圆点的坐标
    public function printCenter()
    {
        printf('center coordinate is (%d, %d)', $this->center->x, $this->center->y);
    }

    //计算圆形的面积
    public function area()
    {
        return self::PI * pow($this->radius, 2);
    }
}

$refl_class = new ReflectionClass(Circle::class);
$refl_args = new ReflectionClass(Point::class);
$object = $refl_class->newInstanceArgs([$refl_args, 100]);
echo get_class($object) . PHP_EOL;
echo $object->area();
