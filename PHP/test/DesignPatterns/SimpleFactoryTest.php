<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Creational\SimpleFactory\ConcreteFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    protected $factory;

    protected function setUp(): void
    {
        $this->factory = new ConcreteFactory();
    }

    public function getType()
    {
        return array(
            array('bicycle'),
            array('other')
        );
    }

    /**
     * @dataProvider getType
     */
    public function testCreation($type)
    {
        $obj = $this->factory->createVehicle($type);
        $this->assertInstanceOf('DesignPatterns\Creational\SimpleFactory\VehicleInterface', $obj);
    }

    public function testBadType()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->factory->createVehicle('car');
    }
}
