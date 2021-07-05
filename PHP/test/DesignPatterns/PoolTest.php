<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Creational\Pool\Pool;
use PHPUnit\Framework\TestCase;

class PoolTest extends TestCase
{
    public function testPool()
    {
        $pool = new Pool('Tests\DesignPatterns\WorkerTest');
        $worker = $pool->get();

        $this->assertEquals(1, $worker->id);

        $worker->id = 5;
        $pool->dispose($worker);

        $this->assertEquals(5, $pool->get()->id);
        $this->assertEquals(1, $pool->get()->id);
    }
}
