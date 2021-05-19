<?php

require './../../../vendor/autoload.php';

$observable = new \Popp\behavior\observer\Login();
$observable->attach(new \Popp\behavior\observer\GeneralLogger($observable));
$observable->attach(new \Popp\behavior\observer\SecurityMonitor($observable));
$partership = new \Popp\behavior\observer\PartnershipTool($observable);
$observable->attach($partership);
$observable->handleLogin('root', '12345', '127.0.0.1');

$observable->detach($partership);
$observable->handleLogin('boot', '64321', '127.0.0.1');
