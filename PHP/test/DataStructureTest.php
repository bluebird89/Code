<?php

namespace Tests;

use Algorithms\data_structure\Queue\SimpleQueue;
use Algorithms\data_structure\Stack\SimpleStack;
use PHPUnit\Framework\TestCase;

class DataStructureTest extends TestCase
{

    public function testQueue(): void
    {

        $queue = new SimpleQueue(5);
        $queue->enqueue(1);
        $queue->enqueue(3);
        $queue->enqueue(5);
        self::assertEquals(1, $queue->dequeue());
        self::assertEquals(2, $queue->size());
    }

    public function testStack(): void
    {
        $stack = new SimpleStack(15);
        self::assertTrue($stack->isEmpty());
        $stack->push(111);
        $stack->push('hello');
        self::assertEquals('hello', $stack->pop());
        self::assertEquals(1, $stack->size());
    }
}
