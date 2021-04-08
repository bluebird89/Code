<?php

namespace Oop;

abstract class Car
{
	protected $brand;

	/**
	 * Car constructor.
	 *
	 * @param $brand
	 */
	public function __construct($brand)
	{
		$this->brand = $brand;
	}

	abstract public function drive();
}
