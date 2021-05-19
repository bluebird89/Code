<?php


namespace Popp\behavior\observer;

use SplObserver;

class Login implements \SplSubject
{
    const LOGIN_USER_UNKNOW = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;

    private $status = [];

    public function handleLogin($user, $pass, $ip)
    {
        $ret = 0;
        switch (rand(1, 3)) {
            case 1:
                $this->setStatus(self::LOGIN_USER_UNKNOW, $user, $ip);
                $ret = false;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $ret = false;
                break;
            case 2:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $ret = true;
                break;
        }
        $this->notify();
        return $ret;
    }

    private \SplObjectStorage $storage;

    public function __construct()
    {
        $this->storage = new \SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->storage->detach($observer);
    }

    public function notify()
    {
        foreach ($this->storage as $obj) {
            $obj->update($this);
        }
    }

    private function setStatus(int $status, $user, $ip)
    {
        $this->status = [$status, $user, $ip];
    }

    public function getStatus()
    {
        return $this->status;
    }
}
