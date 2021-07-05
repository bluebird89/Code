<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{
    private $stack;

    protected function setUp(): void
    {
        $this->stack = [];
    }

    public function testEmpty()
    {
        $this->assertEquals(0, count($this->stack));
    }

    public function testPush()
    {
        array_push($this->stack, 'foo');
        $this->assertSame('foo', $this->stack[count($this->stack) - 1]);
        $this->assertNotEmpty($this->stack);
    }

    public function testPop()
    {
        array_push($this->stack, 'foo');
        $this->assertEquals('foo', array_pop($this->stack));
        $this->assertEmpty($this->stack);
    }
}
