<?php


namespace Popp\behavior\observer;


abstract class LoginObserver implements \SplObserver
{


    private $login;

    public function __construct(Login $login)
    {
        $this->login = $login;
    }

    public function update(\SplSubject $observable)
    {
        if ($observable === $this->login) {
            $this->doUpdate($observable);
        }
    }

    abstract public function doUpdate(Login $login);
}
