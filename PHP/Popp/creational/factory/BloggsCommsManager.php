<?php

namespace Popp\creational\factory;

require_once(__DIR__."/../../../vendor/autoload.php");

class BloggsCommsManager extends CommsManager
{

    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }

    public function getHeader(): string
    {
        return 'BloggsCal header\n';
    }

    public function getFooter(): string
    {
        return 'BloggsCal footer\n';
    }
}
