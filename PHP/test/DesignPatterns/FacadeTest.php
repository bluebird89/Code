<?php

namespace Tests\DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPatterns\Structural\Facade\Facade as Computer;
use DesignPatterns\Structural\Facade\OsInterface;

class FacadeTest extends TestCase
{
    public function getComputer()
    {
        $bios = $this->getMockBuilder('DesignPatterns\Structural\Facade\BiosInterface')
            ->setMethods(array('launch', 'execute', 'waitForKeyPress'))
            ->disableAutoload()
            ->getMock();
        $os = $this->getMockBuilder('DesignPatterns\Structural\Facade\OsInterface')
            ->setMethods(array('getName'))
            ->disableAutoload()
            ->getMock();
        $bios->expects($this->once())
            ->method('launch')
            ->with($os);
        $os->expects($this->once())
            ->method('getName')
            ->will($this->returnValue('Linux'));

        $facade = new Computer($bios, $os);
        return array(array($facade, $os));
    }

    /**
     * @dataProvider getComputer
     */
    public function testComputerOn(Computer $facade, OsInterface $os)
    {
        // interface is simpler :
        $facade->turnOn();
        // but I can access to lower component
        $this->assertEquals('Linux', $os->getName());
    }
}
