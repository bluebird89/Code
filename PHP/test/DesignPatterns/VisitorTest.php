<?php

namespace Tests\DesignPatterns;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use DesignPatterns\Behavioral\Visitor;

class VisitorTest extends TestCase
{
    protected $visitor;

    protected function setUp(): void
    {
        $this->visitor = new Visitor\RolePrintVisitor();
    }

    public function getRole()
    {
        return array(
            array(new Visitor\User("Dominik"), 'Role: User Dominik'),
            array(new Visitor\Group("Administrators"), 'Role: Group: Administrators')
        );
    }

    /**
     * @dataProvider getRole
     */
    public function testVisitSomeRole(Visitor\Role $role, $expect)
    {
        $this->expectOutputString($expect);
        $role->accept($this->visitor);
    }

    public function testUnknownObject()
    {
        $this->expectExceptionMessage("Mock");
        $this->expectException(InvalidArgumentException::class);
        $mock = $this->getMockForAbstractClass('DesignPatterns\Behavioral\Visitor\Role');
        $mock->accept($this->visitor);
    }
}
