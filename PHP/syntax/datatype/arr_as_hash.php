<?php

$arr['name'] = 'henry';
$arr[] = 'henry';
echo count($arr);
$arr[] = 'henry';
echo count($arr);

in_array(5, [1, 2, 3, 4, 5], true);

$arr = [];
$obj1 = new stdClass();
array_push($arr, $obj1);
$obj2 = new stdClass();
array_push($arr, $obj2);
array_push($arr, $obj2);
var_dump($arr);
var_dump(in_array((new stdClass()), $arr));
var_dump(in_array((new stdClass()), $arr, true));

var_dump(new stdClass() == new stdClass());
var_dump(new stdClass() === new stdClass());
