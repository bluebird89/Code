<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Structural\Decorator\RendererInterface;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\TestCase;
use DesignPatterns\Structural\Decorator;
use stdClass;
use TypeError;

class DecoratorTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        $this->service = new Decorator\Webservice(array('foo' => 'bar'));
    }

    public function testJsonDecorator()
    {
        // Wrap service with a JSON decorator for renderers
        $service = new Decorator\RenderInJson($this->service);
        // Our Renderer will now output JSON instead of an array
        $this->assertEquals('{"foo":"bar"}', $service->renderData());
    }

    public function testXmlDecorator()
    {
        // Wrap service with a XML decorator for renderers
        $service = new Decorator\RenderInXml($this->service);
        // Our Renderer will now output XML instead of an array
        $xml = '<?xml version="1.0"?><foo>bar</foo>';
        $this->assertXmlStringEqualsXmlString($xml, $service->renderData());
    }

    /**
     * The first key-point of this pattern :
     */
    public function testDecoratorMustImplementsRenderer()
    {
        $className = 'DesignPatterns\Structural\Decorator\Decorator';
        $interfaceName = 'DesignPatterns\Structural\Decorator\RendererInterface';
        $this->assertTrue(is_subclass_of($className, $interfaceName));
    }

    /**
     * Second key-point of this pattern : the decorator is type-hinted
     *
     */
    public function testDecoratorTypeHinted()
    {
        $this->expectException(Error::class);
        if (version_compare(PHP_VERSION, '7', '>=')) {
            throw new Error('Skip test for PHP 7', 0, __FILE__, __LINE__);
        }

        $this->getMockForAbstractClass('DesignPatterns\Structural\Decorator\Decorator', array(new stdClass()));
    }

    /**
     * Second key-point of this pattern : the decorator is type-hinted
     *
     * @requires PHP 7
     *
     *
     */
    public function testDecoratorTypeHintedForPhp7()
    {
        $this->expectException(TypeError::class);
        $this->getMockForAbstractClass('DesignPatterns\Structural\Decorator\Decorator', array(new stdClass()));
    }

    /**
     * The decorator implements and wraps the same interface
     */
    public function testDecoratorOnlyAcceptRenderer()
    {
        $mock = $this->getMockForAbstractClass('DesignPatterns\Structural\Decorator\RendererInterface');
        $dec = $this->getMockForAbstractClass('DesignPatterns\Structural\Decorator\Decorator', array($mock));
        $this->assertNotNull($dec);
    }
}
