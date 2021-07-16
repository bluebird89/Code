<?php


namespace syntax\Ioc;

class FileILog implements iLog
{
    public function write()
    {
        echo 'file log write...';
    }
}
