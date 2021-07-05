<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Structural\DependencyInjection\ArrayConfig;
use DesignPatterns\Structural\DependencyInjection\Connection;
use PHPUnit\Framework\TestCase;

class DependencyInjectionTest extends TestCase
{
    protected $config;
    protected $source;

    public function setUp(): void
    {
        $this->source = include 'config.php';
        $this->config = new ArrayConfig($this->source);
    }

    public function testDependencyInjection()
    {
        $connection = new Connection($this->config);
        $connection->connect();
        $this->assertEquals($this->source['host'], $connection->getHost());
    }
}
