<?php


namespace Oop;


class Car3
{
	public $brand;
	/**
	 * @var Engine
	 */
	public $engine;

	public function __clone()
	{
		$this->engine = clone $this->engine;
	}
}

$benz = new Car3();
$benz->brand = '奔驰';
$engine = new Engine();
$benz->engine = $engine;

$lnykco02 = clone $benz;
$lnykco02->brand = '领克02';
$lnykco02->engine->num = 3;

var_dump($benz);
var_dump($lnykco02);
