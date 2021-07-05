<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use syntax\phpunit\AbstractTrait;

class ArstractTraitTest extends TestCase
{

    public function testConcreteMethod(): void
    {
        $mock = $this->getMockForTrait(AbstractTrait::class);

        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(true));

        $this->assertTrue($mock->concreteMethod());
    }
}
