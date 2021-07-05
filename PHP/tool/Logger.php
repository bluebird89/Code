<?php

namespace tool;

class Logger
{
    public function __construct(/*Logging $logger*/)
    {
    }

    public function logger($type, $message)
    {
        $log = sprintf("%s\t%s\t%s\n", date('Y-m-d H:i:s'), $type, $message);
        file_put_contents(sprintf(__DIR__ . "/../log/sender.%s.log", date('Y-m-d')), $log, FILE_APPEND);
    }
}
