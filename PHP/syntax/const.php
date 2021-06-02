<?php

# const
## vs variable:in different position in memory
define("LANGUAGE", "PHP");
echo LANGUAGE.PHP_EOL;

const FRAMEWORK = "Laravel";
echo FRAMEWORK.PHP_EOL;

defined("FRAMEWORK") || define("FRAMEWORK", "Yii");
echo LANGUAGE." ".FRAMEWORK;
