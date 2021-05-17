<?php


namespace Popp\ch18;


class Validator
{
    private $store;

    public function __construct(UserStore $store)
    {
        $this->store = $store;
    }

    public function validateUser(string $mail, string $pass): bool
    {
        if (!is_array($user = $this->store->getUser($mail))) {
            return false;
        }
        if ($user['pass'] == $pass) {
            return true;
        }
        $this->store->notifyPasswordFailure($mail);
        return false;
    }
}
