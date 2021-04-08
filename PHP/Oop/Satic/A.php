<?php


namespace Oop\Trit\Satic;


class A
{
	public static function test()
	{
		static::who();
	}

	/**
	 * summary
	 */
	public static function who()
	{
		echo __CLASS__;
	}

	public function getClassName()
	{
		return static::class;
	}
}
