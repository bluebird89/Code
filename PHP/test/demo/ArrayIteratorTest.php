<?php
namespace Tests\demo;

use ArrayIterator;
use PHPUnit\Framework\TestCase;

class ArrayIteratorTest extends TestCase
{
    public function testEmptyArrayIsNotIterateOver()
    {
        $iteraor = new ArrayIterator([]);
        foreach ($iteraor as $element) {
            $this->fail();
        }
    }

    public function testIteratesOverOneElementArraysUsingValues()
    {
        $iterator = new ArrayIterator(array('foo'));
        foreach ($iterator as $element) {
            $this->assertEquals('foo', $element);
        }
    }

    public function testIteratesOneTimeOverOneElementArrays()
    {
        $iterator = new ArrayIterator(array('foo'));
        $i = 0;
        foreach ($iterator as $element) {
            $i++;
        }
        $this->assertEquals(1, $i);
    }

    public function testIteratesOverAssociativeArrays()
    {
        $iterator = new ArrayIterator(array('foo' => 'bar'));
        $i = 0;

        foreach ($iterator as $key => $element) {
            $i++;
            $this->assertEquals('foo', $key);
            $this->assertEquals('bar', $element);
        }
        $this->assertEquals(1, $i);
    }
}
