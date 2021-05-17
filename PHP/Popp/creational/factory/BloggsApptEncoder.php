<?php


namespace Popp\creational\factory;

require_once(__DIR__."/../../../vendor/autoload.php");

class BloggsApptEncoder extends ApptEncoder
{

    public function encode(): string
    {
        return 'Appointment data encode in BloggsCal format\n';
    }
}
