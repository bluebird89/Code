<?php
$mem = new Memcache();
$mem->connect('localhost', '11211') or die ("Could not connect");

$mem->set('name', 'henry', 0, 3600);
echo $mem->get('name').'<br />';
// data type
$mem->set('int', 100, 0, 3600);
$mem->set('float', 100.110, 0, 3600);
$mem->set('bool', true, 0, 3600);
$mem->set('string', 'welcome to Shanghai', 0, 3600);

var_dump($mem->get('int'));
echo '<br />';
var_dump($mem->get('float'));
echo '<br />';
var_dump($mem->get('bool'));
echo '<br />';
var_dump($mem->get('string'));
echo '<br />';
// 
$arr = array('Henry', 'Lily', 'Cazolar');
$mem->set('array', $arr, 0, 3600);
$conn = mysql_connect('localhost', 'root', 'root');
$mem->set('res', $conn, 0, 3600);

class dog
{
}

;
$dog = new dog();
$dog->name = 'Longlong';
$mem->set('object', $dog, 0, 3600);
$mem->set('null', null, 0, 3600);

var_dump($mem->get('array'));
echo '<br />';
var_dump($mem->get('res'));
echo '<br />';
var_dump($mem->get('object'));//require class definetion
echo '<br />';
var_dump($mem->get('null'));
echo '<br />';

$version = $mem->getVersion();
echo "服务端版本信息: ".$version."<br/>\n";

$tmp_object = new stdClass;
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;

$mem->set('key', $tmp_object, false, 10) or die ("Failed to save data at the server");
echo "将数据保存到缓存中（数据10秒后失效）<br/>\n";

$get_result = $mem->get('key');
echo "从缓存中取到的数据:<br/>\n";

var_dump($get_result);

$session_save_path = "tcp://$host:$port?persistent=1&weight=2&timeout=2&retry_interval=10,  ,tcp://$host:$port  ";
ini_set('session.save_handler', 'memcache');
ini_set('session.save_path', $session_save_path);
