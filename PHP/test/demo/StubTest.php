<?php


namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use syntax\phpunit\SomeClass;

class StubTest extends TestCase
{
    public function testStub(): void
    {
        // 为 SomeClass 类创建桩件
        $stub = $this->createStub(SomeClass::class);
//        $stub = $this->getMockBuilder(SomeClass::class)
//            ->disableOriginalConstructor()
//            ->disableOriginalClone()
//            ->disableArgumentCloning()
//            ->disallowMockingUnknownTypes()
//            ->getMock();

        // 配置桩件
        $stub->method('doSomething')
            ->willReturn('foo');

        // 调用 $stub->doSomething() 会返回 'foo'
        $this->assertSame('foo', $stub->doSomething());
    }

    public function testReturnArgumentStub(): void
    {
        // 类创建桩件
        $stub = $this->createStub(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnArgument(0));

        // $stub->doSomething('foo') 返回 'foo'
        $this->assertSame('foo', $stub->doSomething('foo'));

        // $stub->doSomething('bar') 返回 'bar'
        $this->assertSame('bar', $stub->doSomething('bar'));
    }

    public function testReturnSelf(): void
    {
        // 为 SomeClass 类创建桩件
        $stub = $this->createStub(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnSelf());

        // $stub->doSomething() 返回 $stub
        $this->assertSame($stub, $stub->doSomething());
    }

    public function testReturnValueMapStub(): void
    {
        // 为 SomeClass 类创建桩件
        $stub = $this->createStub(SomeClass::class);

        // Create a map of arguments to return values.
        $map = [
            ['a', 'b', 'c', 'd'],
            ['e', 'f', 'g', 'h']
        ];

        // 配置桩件
        $stub->method('doSomething')
            ->will($this->returnValueMap($map));

        // $stub->doSomething() 根据提供的参数返回不同的值。
        $this->assertSame('d', $stub->doSomething('a', 'b', 'c'));
        $this->assertSame('h', $stub->doSomething('e', 'f', 'g'));
    }

    public function testReturnCallbackStub(): void
    {
        // 创建桩件
        $stub = $this->createStub(SomeClass::class);

        // 配置桩件
        $stub->method('doSomething')
            ->will($this->returnCallback('str_rot13'));

        // $stub->doSomething($argument) 返回 str_rot13($argument)
        $this->assertSame('fbzrguvat', $stub->doSomething('something'));
    }

    public function testOnConsecutiveCallsStub(): void
    {
        // 为 SomeClass 类创建桩件
        $stub = $this->createStub(SomeClass::class);

        // 配置桩件
        $stub->method('doSomething')
            ->will($this->onConsecutiveCalls(2, 3, 5, 7));

        // $stub->doSomething() 每次都会返回不同的值
        $this->assertSame(2, $stub->doSomething());
        $this->assertSame(3, $stub->doSomething());
        $this->assertSame(5, $stub->doSomething());
    }

    /**
     * @skip
     */
    public function testThrowExceptionStub(): void
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createStub(SomeClass::class);

        // 配置桩件
        $stub->method('doSomething')
            ->will($this->throwException(new Exception));

        // $stub->doSomething() 抛出异常
        $stub->doSomething();
    }
}
