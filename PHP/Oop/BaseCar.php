<?php


namespace Oop;

abstract class BaseCar implements CarContract
{
	protected $brand;
	protected $power;

	public function __construct(Power $power, $brand)
	{
		$this->power = $power;
		$this->brand = $brand;
	}

	abstract public function drive();
}
