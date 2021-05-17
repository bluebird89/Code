<?php


namespace Popp\creational\singleton;

class Preferences
{
    private array $props = [];
    private static Preferences $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }
        return self::$instance;
    }

    public function setProperty($key, $value)
    {
        $this->props[$key] = $value;
    }

    public function getProperty($key)
    {
        return $this->props[$key];
    }
}
