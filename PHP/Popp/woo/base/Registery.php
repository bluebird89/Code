<?php


namespace Popp\woo;

/**
 * 注册表模式
 *
 * @package Popp\woo
 */
class Registery
{
    private static $instance;
    private $values = [];

    private function __construct()
    {
    }

    public function instance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get($key)
    {
        if (isset($this->vales[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    public function set($key, $value)
    {
        $this->values[$key] = $value;
    }
}
