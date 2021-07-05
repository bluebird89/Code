<?php


namespace syntax\process;


class LoggerP extends Logger
{
    //public static $signal = null;

    public function __construct()
    {
        //self::$signal == null;
    }

    public function run()
    {
        while (true) {
            pcntl_signal_dispatch();
            printf(".");
            sleep(1);
            if (Signal::get() == SIGHUP) {
                Signal::reset();
                break;
            }
        }
        printf("\n");
    }
}
