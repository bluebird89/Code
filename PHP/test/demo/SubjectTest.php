<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use stdClass;
use syntax\phpunit\Observer;
use syntax\phpunit\Subject;

class SubjectTest extends TestCase
{
    public function testObserversAreUpdated(): void
    {
        // 为 Observer 类建立仿件
        $observer = $this->createMock(Observer::class);
        // Excpects:为 update() 方法建立预期：以字符串 'something' 为参数 调用模仿的 Observer 对象的 update() 方法调用一次
        $observer->expects($this->once())->method('update')->with($this->equalTo('something'));

        // 建立 Subject 对象并且将模仿的 Observer 对象附加其上
        $subject = new Subject('My subject');
        // Action:在 $subject 上调用 doSomething() 方法
        $subject->attach($observer);
        $subject->doSomething();
    }

    public function testErrorReported(): void
    {
        // 为 Observer 类建立仿件
        $observer = $this->createMock(Observer::class);

        $observer->expects($this->once())
            ->method('reportError')
            ->with(
                $this->greaterThan(0),
                $this->stringContains('Something'),
                $this->anything()
            );

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // doSomethingBad() 方法应当会通过
        // reportError() 方法向 observer 报告错误。
        $subject->doSomethingBad();
    }

    public function testFunctionCalledTwoTimesWithSpecificArguments(): void
    {
        $mock = $this->getMockBuilder(stdClass::class)
            ->setMethods(['set'])
            ->getMock();

        $mock->expects($this->exactly(2))
            ->method('set')
            ->withConsecutive(
                [$this->equalTo('foo'), $this->greaterThan(0)],
                [$this->equalTo('bar'), $this->greaterThan(0)]
            );

        $mock->set('foo', 21);
        $mock->set('bar', 48);
    }

    // 模仿 reportError() 方法
    public function testErrorReported1(): void
    {
        // 为 Observer 类建立仿件
        $observer = $this->createMock(Observer::class);

        $observer->expects($this->once())
            ->method('reportError')
            ->with(
                $this->greaterThan(0),
                $this->stringContains('Something'),
                $this->callback(function ($subject) {
                    return is_callable([$subject, 'getName']) &&
                        $subject->getName() == 'My subject';
                })
            );

        $subject = new Subject('My subject');
        $subject->attach($observer);
        // doSomethingBad() 方法应当会通过
        // reportError() 方法向 observer 报告错误
        $subject->doSomethingBad();
    }

    //测试某个方法将会被调用一次，并且以某个特定对象作为参数。
    public function testIdenticalObjectPassed(): void
    {
        $expectedObject = new stdClass;

        $mock = $this->getMockBuilder(stdClass::class)
//            仿件会克隆参数，因此 identicalTo 约束会失败。
//            ->enableArgumentCloning()
            ->setMethods(['foo'])
            ->getMock();

        $mock->expects($this->once())
            ->method('foo')
            ->with($this->identicalTo($expectedObject));

        $mock->foo($expectedObject);
    }
}
