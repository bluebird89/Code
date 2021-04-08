<?php

class Car
{
    public static $WHEELS = 4;

    public static function getWheels()
    {
        return self::$WHEELS;
    }

    public static function getClass()
    {
        echo static::class.PHP_EOL;
    }

    public static function test()
    {
        # 后期静态绑定
        self::getLine();
        static::getLine();
    }

    public function getLine()
    {
        echo __LINE__.PHP_EOL;
    }
}

class Benz extends Car
{
    public function getLine()
    {
        echo __LINE__.PHP_EOL;
    }
}

Benz::test();
Benz::getClass();
