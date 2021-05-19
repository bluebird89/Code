<?php

require './../../../vendor/autoload.php';

$controller = new \Popp\behavior\command\Controller();

$context = $controller->getContext();
$context->addParam('action', 'login');
$context->addParam('username', 'root');
$context->addParam('pass', '12345');

$controller->process();
