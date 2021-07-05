<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;

//来自于数据供给器的参数将先于来自所依赖的测试
class DependencyAndDataProviderComboTest extends TestCase
{
    public function provider()
    {
        return [['provider1', 'provider2']];
    }

    public function testProducerOne()
    {
        $this->assertTrue(true);
        return 'First';
    }

    public function testProducerTwo()
    {
        $this->assertTrue(true);
        return 'Two';
    }

    /**
     * @depends      testProducerOne
     * @depends      testProducerTwo
     * @dataProvider provider
     */
    public function testConsumer()
    {
        $this->assertEquals(['provider1', 'provider2', 'First', 'Two'], func_get_args());
    }
}
