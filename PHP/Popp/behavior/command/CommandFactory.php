<?php


namespace Popp\behavior\command;

class CommandFactory
{
    private static $dir = 'commands';

    public static function getCommand($action = 'Default')
    {
        if (preg_match('/\W/', $action)) {
            throw new \Exception('Illegal character in action');
        }
        $class = ucfirst(strtolower($action)).'Command';
        $file = self::$dir.DIRECTORY_SEPARATOR."{$class}.php";

        if (!file_exists($file)) {
            throw new CommandNotFoundExcpetion("Could not find '$file'");
        }
        require_once $file;
        $class = 'Popp\behavior\command\commands\\'.$class;

        if (!class_exists($class)) {
            throw new CommandNotFoundExcpetion("No $class class located");
        }

        return new $class();
    }
}
