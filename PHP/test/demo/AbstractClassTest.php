<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use syntax\phpunit\AbstractClass;

class AbstractClassTest extends TestCase
{
    public function testConcreteMethod(): void
    {
        $stub = $this->getMockForAbstractClass(AbstractClass::class);

        $stub->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(true));

        $this->assertTrue($stub->concreteMethod());
    }
}
