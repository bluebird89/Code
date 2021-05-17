<?php

use Popp\creational\singleton\Preferences;

require "./Preferences.php";

$pref = Preferences::getInstance();

$pref->setProperty("name", "henry");
unset($pref);
print Preferences::getInstance()->getProperty("name");
