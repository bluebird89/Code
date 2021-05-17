<?php


use Popp\creational\factory\BloggsCommsManager;
use Popp\creational\factory\MegaCommsManager;

require './../../../vendor/autoload.php';

$instance = new BloggsCommsManager();
print $instance->getHeader().$instance->getApptEncoder()->encode().$instance->getFooter().PHP_EOL;
$instance = new MegaCommsManager();
print $instance->getHeader().$instance->getApptEncoder()->encode().$instance->getFooter();
