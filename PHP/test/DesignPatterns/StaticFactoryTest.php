<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Creational\StaticFactory\StaticFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{
    public function getTypeList()
    {
        return array(
            array('string'),
            array('number')
        );
    }

    /**
     * @dataProvider getTypeList
     */
    public function testCreation($type)
    {
        $obj = StaticFactory::factory($type);
        $this->assertInstanceOf('DesignPatterns\Creational\StaticFactory\FormatterInterface', $obj);
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        StaticFactory::factory("");
    }
}
