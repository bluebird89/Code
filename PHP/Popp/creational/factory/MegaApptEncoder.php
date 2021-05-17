<?php


namespace Popp\creational\factory;


require_once(__DIR__."/../../../vendor/autoload.php");

class MegaApptEncoder extends ApptEncoder
{

    public function encode(): string
    {
        return 'Appointment data encode in MegaCal format\n';
    }
}
