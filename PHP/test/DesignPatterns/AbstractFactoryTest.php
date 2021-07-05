<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Creational\AbstractFactory\AbstractFactory;
use DesignPatterns\Creational\AbstractFactory\HtmlFactory;
use DesignPatterns\Creational\AbstractFactory\JsonFactory;

/**
 * AbstractFactoryTest 用于测试具体的工厂
 */
class AbstractFactoryTest extends TestCase
{
    public function getFactories()
    {
        return [
            [new JsonFactory()],
            [new HtmlFactory()]
        ];
    }

    /**
     * 工厂客户端，无需关心传递过来的是什么工厂类，
     * 只需以想要的方式渲染任意想要的组件即可。
     *
     * @dataProvider getFactories
     *
     * @param  AbstractFactory  $factory
     */
    public function testComponentCreation(AbstractFactory $factory)
    {
        $article = [
            $factory->createText('Laravel学院'),
            $factory->createPicture('/image.jpg', 'laravel-academy'),
            $factory->createText('LaravelAcademy.org')
        ];

        $this->assertContainsOnly('DesignPatterns\Creational\AbstractFactory\MediaInterface', $article);
    }
}
