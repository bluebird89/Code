<?php

use Popp\behavior\decorator\AuthenticateRequest;
use Popp\behavior\decorator\LogRequest;
use Popp\behavior\decorator\MainProcess;
use Popp\behavior\decorator\StructureRequest;

require './../../../vendor/autoload.php';
require './AuthenticateRequest.php';


$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));
$process->process(new \Popp\behavior\decorator\RequestHelper());
