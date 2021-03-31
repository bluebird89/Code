#!/usr/bin/env php
<?php


//var_dump($argv);

$phpcli = new PHPCli();
$res = $phpcli->resolveRequest($argv);

//var_dump($res);

call_user_func(array($res[0], $res[2][0]), $res[1]);
sleep(2);


class Test
{
    public function updateUserStatus($userid)
    {
        echo 'ok:'.json_encode($userid)."\n";
    }
}


class PHPCli
{
    private $defaultAction = 'index';

    public function __construct()
    {
        if (!isset($_SERVER['argv'])) // || strncasecmp(php_sapi_name(),'cli',3))
        {
            die('This script must be run from the command line.');
        }

        if (isset($argv[0])) {
            $name = $argv[0];
            array_shift($argv);
        } else {
            $name = 'help';
        }
    }

    public function resolveRequest($args)
    {
        $options = array();    // named parameters
        $params = array();    // unnamed parameters
        foreach ($args as $arg) {
            if (preg_match('/^--(\w+)(=(.*))?$/', $arg, $matches)) {
                $name = $matches[1];
                $value = isset($matches[3]) ? $matches[3] : true;
                if (isset($options[$name])) {
                    if (!is_array($options[$name])) {
                        $options[$name] = array($options[$name]);
                    }
                    $options[$name][] = $value;
                } else {
                    $options[$name] = $value;
                }
            } else {
                if (isset($action)) {
                    $params[] = $arg;
                } else {
                    $action = $arg;
                }
            }
        }
        if (!isset($action)) {
            $action = $this->defaultAction;
        }

        return array($action, $options, $params);
    }
}
