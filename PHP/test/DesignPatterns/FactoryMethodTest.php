<?php

namespace Test\DesignPatterns;

use DesignPatterns\Creational\FactoryMethod\FactoryMethod;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use DesignPatterns\Creational\FactoryMethod\GermanFactory;
use DesignPatterns\Creational\FactoryMethod\ItalianFactory;

/**
 * FactoryMethodTest用于测试工厂方法模式
 */
class FactoryMethodTest extends TestCase
{
    protected $type = array(
        FactoryMethod::CHEAP,
        FactoryMethod::FAST
    );

    public function getShop()
    {
        return array(
            array(new GermanFactory()),
            array(new ItalianFactory())
        );
    }

    /**
     * @dataProvider getShop
     */
    public function testCreation(FactoryMethod $shop)
    {
        // 该方法扮演客户端角色，我们不关心什么工厂，我们只知道可以可以用它来造车
        foreach ($this->type as $oneType) {
            $vehicle = $shop->create($oneType);
            $this->assertInstanceOf('DesignPatterns\Creational\FactoryMethod\VehicleInterface', $vehicle);
        }
    }

    /**
     * @dataProvider getShop
     */
    public function testUnknownType(FactoryMethod $shop)
    {
        $this->expectExceptionMessage("spaceship is not a valid vehicle");
        $this->expectException(InvalidArgumentException::class);
        $shop->create('spaceship');
    }
}
