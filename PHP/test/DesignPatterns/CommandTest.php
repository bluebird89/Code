<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Behavioral\Command\Invoker;
use DesignPatterns\Behavioral\Command\Receiver;
use DesignPatterns\Behavioral\Command\HelloCommand;

class CommandTest extends TestCase
{
    /**
     * @var Invoker
     */
    protected $invoker;

    /**
     * @var Receiver
     */
    protected $receiver;

    protected function setUp(): void
    {
        $this->invoker = new Invoker();
        $this->receiver = new Receiver();
    }

    public function testInvocation()
    {
        $this->invoker->setCommand(new HelloCommand($this->receiver));
        $this->expectOutputString('Hello World');
        $this->invoker->run();
    }
}
