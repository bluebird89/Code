<?php


namespace Oop;

class Users
{
    private $username;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    // 不提供__isset()，会返回空数组
    public function __isset($prop): bool
    {
        return isset($this->$prop);
    }
}
