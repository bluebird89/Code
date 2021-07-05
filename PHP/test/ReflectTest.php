<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use syntax\Reflect\Resolve;

class ReflectTest extends TestCase
{
    /**
     * 传人依赖参数
     */
    public function testMain()
    {
        $circle = Resolve::make('Circle');
        $this->assertEquals(3.14, $circle->area());
    }
}
