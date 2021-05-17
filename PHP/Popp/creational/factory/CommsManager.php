<?php


namespace Popp\creational\factory;

require './ApptEncoder.php';

abstract class CommsManager
{
    abstract public function getApptEncoder(): ApptEncoder;

    abstract public function getHeader(): string;

    abstract public function getFooter(): string;
}
