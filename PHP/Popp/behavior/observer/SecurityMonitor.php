<?php


namespace Popp\behavior\observer;

class SecurityMonitor extends LoginObserver
{

    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        if ($status[0] = Login::LOGIN_WRONG_PASS) {
            print __CLASS__.":\tsending mail to sysadmin.\n";
        }
    }
}
