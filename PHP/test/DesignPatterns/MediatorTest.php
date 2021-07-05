<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Behavioral\Mediator\Mediator;
use DesignPatterns\Behavioral\Mediator\Subsystem\Database;
use DesignPatterns\Behavioral\Mediator\Subsystem\Client;
use DesignPatterns\Behavioral\Mediator\Subsystem\Server;

class MediatorTest extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        $media = new Mediator();
        $this->client = new Client($media);
        $media->setColleague(new Database($media), $this->client, new Server($media));
    }

    public function testOutputHelloWorld()
    {
        $this->expectOutputString('Hello World');
        // 正如你所看到的, Client, Server 和 Database 是完全解耦的
        $this->client->request();
    }
}
