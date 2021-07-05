<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use syntax\oop\Person;
use syntax\oop\Worker;

class WorkerTest extends TestCase
{
    public function testSay()
    {
        $person = $this->createStub(Person::class);
        $person->method('say')->will('llo');
        $person->say();
    }

    public function testWorkerSay()
    {
        $worker = $this->createStub(Worker::class);
        $worker->say();
    }
}
