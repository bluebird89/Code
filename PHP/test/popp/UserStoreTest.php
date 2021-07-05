<?php

namespace Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use popp\ch18\UserStore;

class UserStoreTest extends TestCase
{
    private $store;

    public function setUp(): void
    {
        $this->store = new UserStore();
    }

    public function tearDown(): void
    {
    }

    public function testGetUser()
    {
        $this->store->addUser("bob williams", "a@b.com", "12345");
        $user = $this->store->getUser("a@b.com");

        $this->assertEquals($user->getMail(), "a@b.com");
        $this->assertEquals($user['name'], "bob williams");
        $this->assertEquals($user['pass'], "12345");
    }

    // Testing Exceptions
    public function testAddUserShortPass()
    {
        $this->expectException('\\Exception');
        $this->store->addUser("bob williams", "a@b.com", "ff");
        $this->fail("Short password exception expected");
    }

    // Constraints
    public function testAddUserDuplicate()
    {
        try {
            $ret = $this->store->addUser("bob williams", "a@b.com", "123456");
            $ret = $this->store->addUser("bob stevens", "a@b.com", "123456");
            self::fail("Exception should have been thrown");
        } catch (Exception $e) {
            $const = $this->logicalAnd($this->logicalNot($this->contains("bob stevens")), $this->isType('array'));
            self::AssertThat($this->store->getUser("a@b.com"), $const);
        }
    }
}
