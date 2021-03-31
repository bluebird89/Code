<?php

$files = glob('*.php');
print_r($files);

$files = glob(' *.{php,txt}', GLOB_BRACE);
print_r($files);

$files = glob('../images/a*.jpg');
print_r($files);

$files = glob('../images/a *.jpg/');
// applies the function to each array element
$files = array_map('realpath', $files);
print_r($files);
