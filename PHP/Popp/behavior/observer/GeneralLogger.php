<?php


namespace Popp\behavior\observer;

class GeneralLogger extends LoginObserver
{

    public function doUpdate(Login $login)
    {
        print __CLASS__.":\tadd login data to log.".PHP_EOL;
    }
}
