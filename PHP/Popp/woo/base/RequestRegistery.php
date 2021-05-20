<?php


namespace Popp\woo\base;

use Popp\woo\controller\Request;
use Popp\woo\Registery;

class RequestRegistery extends Registery
{
//    private static $instance;
//    private $values = [];
//
//    private function __construct()
//    {
//    }
//
//    public function instance()
//    {
//        if (!isset(self::$instance)) {
//            self::$instance = new self();
//        }
//
//        return self::$instance;
//    }
//
//    public function get($key)
//    {
//        if (isset($this->vales[$key])) {
//            return $this->values[$key];
//        }
//        return null;
//    }
//
//    public function set($key, $value)
//    {
//        $this->values[$key] = $value;
//    }

    public function getRequest()
    {
        $this->instance()->get('request');
    }

    public function setRequest(Request $request)
    {
        return self::set('request', $request);
    }
}
