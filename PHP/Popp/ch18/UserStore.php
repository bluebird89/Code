<?php


namespace Popp\ch18;


class UserStore
{
    private $users = [];

    public function addUser(string $name, string $mail, string $pass): bool
    {
        if (isset($this->users[$mail])) {
            throw new \Exception(
                "User {$mail} already in the system");
        }
        if (strlen($pass) < 5) {
            throw new \Exception(
                "Password must have 5 or more letters");
        }
        $this->users[$mail] = [
            'pass' => $pass, 'mail' => $mail,
            'name' => $name
        ];
        return true;
    }

    public function notifyPasswordFailure(string $mail)
    {
        if (isset($this->users[$mail])) {
            return ($this->users[$mail]);
        }
        return null;
    }

    public function getUser(string $mail): array
    {
        return ($this->users[$mail]);
    }
}
