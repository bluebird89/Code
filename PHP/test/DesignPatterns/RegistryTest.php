<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Structural\Registry\Registry;
use PHPUnit\Framework\TestCase;
use StdClass;

class RegistryTest extends TestCase
{
    public function testSetAndGetLogger()
    {
        Registry::set(Registry::LOGGER, new StdClass());

        $logger = Registry::get(Registry::LOGGER);
        $this->assertInstanceOf('StdClass', $logger);
    }
}
