<?php

namespace Tests\DesignPatterns;

use DesignPatterns\More\Delegation\JuniorDeveloper;
use DesignPatterns\More\Delegation\TeamLead;
use PHPUnit\Framework\TestCase;

class DelegationTest extends TestCase
{
    public function testHowTeamLeadWriteCode()
    {
        $junior = new JuniorDeveloper();
        $teamLead = new TeamLead($junior);
        $this->assertEquals($junior->writeBadCode(), $teamLead->writeCode());
    }
}
